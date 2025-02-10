@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Medical Record</h1>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{{ route('medical_records.update', $medicalRecord) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <!-- Patient Select -->
                <div class="space-y-1">
                    <label for="patient_id" class="block text-sm font-medium text-gray-700">
                        Patient
                    </label>
                    <select name="patient_id" 
                            id="patient_id" 
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm">
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" 
                                    {{ $medicalRecord->patient_id == $patient->id ? 'selected' : '' }}>
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
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 rounded-md shadow-sm">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" 
                                    {{ $medicalRecord->doctor_id == $doctor->id ? 'selected' : '' }}>
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('doctor_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Description Textarea -->
                <div class="space-y-1">
                    <label for="description" class="block text-sm font-medium text-gray-700">
                        Description
                    </label>
                    <textarea name="description" 
                              id="description" 
                              rows="4"
                              class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Enter medical record description">{{ $medicalRecord->description }}</textarea>
                    @error('description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Date Input -->
                <div class="space-y-1">
                    <label for="date" class="block text-sm font-medium text-gray-700">
                        Date & Time
                    </label>
                    <input type="datetime-local" 
                           name="date" 
                           id="date" 
                           value="{{ \Carbon\Carbon::parse($medicalRecord->date)->format('Y-m-d\TH:i') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('date')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Form Actions -->
                <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a href="{{ route('medical_records.index') }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Cancel
                    </a>
                    
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Update Record
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

