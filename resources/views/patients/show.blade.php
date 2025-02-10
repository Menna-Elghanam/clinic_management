@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <!-- Card Container -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h1 class="text-xl font-semibold text-gray-800">Patient Details</h1>
                    <a href="{{ route('patients.index', $patient->clinic->id) }}" 
                       class="text-gray-600 hover:text-gray-900 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Content -->
            <div class="px-6 py-4 space-y-4">
                <!-- Patient Information -->
                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Name
                    </label>
                    <p class="text-gray-900 text-base">
                        {{ $patient->name }}
                    </p>
                </div>

                <!-- Email Information -->
                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Email
                    </label>
                    <p class="text-gray-900 text-base">
                        {{ $patient->email }}
                    </p>
                </div>

                <!-- Phone Information -->
                <div class="border-b border-gray-200 pb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Phone
                    </label>
                    <p class="text-gray-900 text-base">
                        {{ $patient->phone }}
                    </p>
                </div>

                <!-- Clinic Information -->
                <div class="pb-4">
                    <label class="block text-sm font-medium text-gray-600 mb-1">
                        Clinic
                    </label>
                    <p class="text-gray-900 text-base">
                        {{ $patient->clinic->name }}
                    </p>
                </div>
            </div>

            <!-- Actions -->
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('patients.index', $patient->clinic->id) }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to List
                    </a>
                    
                    <a href="{{ route('patients.edit', ['clinic' => $patient->clinic->id, 'patient' => $patient->id]) }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                         <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                         </svg>
                         Edit
                     </a>

                     <form action="{{ route('patients.destroy', ['clinic' => $patient->clinic->id, 'patient' => $patient->id]) }}" 
                        method="POST" 
                        class="inline-block"
                        onsubmit="return confirm('Are you sure you want to delete this record?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" 
                              class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                          </svg>
                          Delete
                      </button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection