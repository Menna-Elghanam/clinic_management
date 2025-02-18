@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Appointment Details</h1>
        </div>

        <!-- Appointment Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Card Header -->
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-800">
                        Appointment Information
                    </h2>
                    <!-- Status Badge -->
                    <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full
                        {{ $appointment->status === 'scheduled' ? 'bg-green-100 text-green-800' : '' }}
                        {{ $appointment->status === 'completed' ? 'bg-blue-100 text-blue-800' : '' }}
                        {{ $appointment->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                        {{ $appointment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                        {{ ucfirst($appointment->status ?? 'Not set') }}
                    </span>
                </div>
            </div>

            <!-- Card Content -->
            <div class="px-6 py-4 space-y-4">
                <!-- Patient Information -->
                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Patient
                    </label>
                    <p class="text-gray-900">{{ $appointment->patient->name }}</p>
                </div>

                <!-- Doctor Information -->
                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Doctor
                    </label>
                    <p class="text-gray-900">{{ $appointment->doctor->name }}</p>
                </div>

                <!-- Appointment Date -->
                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Appointment Date & Time
                    </label>
                    <p class="text-gray-900">
                        {{ \Carbon\Carbon::parse($appointment->appointment_date)->format('F d, Y h:i A') }}
                    </p>
                </div>

                <!-- Additional Information (if any) -->
                @if($appointment->notes)
                <div class="pb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Notes
                    </label>
                    <p class="text-gray-900 whitespace-pre-line">{{ $appointment->notes }}</p>
                </div>
                @endif
            </div>

            <!-- Card Actions -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('appointments.index', $appointment->patient->clinic_id) }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Appointments
                    </a>

                    <a href="{{ route('appointments.edit', [$appointment->patient->clinic_id, $appointment]) }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Appointment
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection