@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Appointment</h1>
            <p class="text-sm text-gray-600 mt-1">{{ $clinic->name }}</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('appointments.update', [$clinic->id, $appointment->id]) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <!-- Patient Select -->
                <div class="space-y-1">
                    <label for="patient_id" class="block text-sm font-medium text-gray-700">
                        Patient
                    </label>
                    <select name="patient_id" 
                            id="patient_id" 
                            required
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm">
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('patient_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Doctor Select -->
                <div class="space-y-1">
                    <label for="doctor_id" class="block text-sm font-medium text-gray-700">
                        Doctor
                    </label>
                    <select name="doctor_id" 
                            id="doctor_id" 
                            required
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm">
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Appointment Date -->
                <div class="space-y-1">
                    <label for="appointment_date" class="block text-sm font-medium text-gray-700">
                        Appointment Date & Time
                    </label>
                    <input type="datetime-local" 
                           name="appointment_date" 
                           id="appointment_date" 
                           required
                           value="{{ date('Y-m-d\TH:i', strtotime($appointment->appointment_date)) }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('appointment_date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Select -->
                <div class="space-y-1">
                    <label for="status" class="block text-sm font-medium text-gray-700">
                        Status
                    </label>
                    <select name="status" 
                            id="status" 
                            required
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm">
                        <option value="scheduled" {{ $appointment->status == 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                        <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('appointments.show', [$clinic->id, $appointment->id]) }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Cancel
                    </a>
                    
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Update Appointment
                    </button>
                </div>
            </form>
        </div>

        <!-- Delete Section -->
        <div class="mt-6">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-red-600">Cancel Appointment</h3>
                    <p class="mt-1 text-sm text-gray-600">
                        Once an appointment is cancelled, it cannot be restored.
                    </p>
                    <div class="mt-4">
                        <form action="{{ route('appointments.destroy', [$clinic->id, $appointment->id]) }}" 
                              method="POST"
                              onsubmit="return confirm('Are you sure you want to cancel this appointment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                                Cancel Appointment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Set minimum date to today for new appointments
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date();
        const formattedDate = today.toISOString().slice(0, 16);
        document.getElementById('appointment_date').min = formattedDate;
    });
</script>
@endpush
@endsection