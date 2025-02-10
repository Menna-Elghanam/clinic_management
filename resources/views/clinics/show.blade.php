@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-blue-500 text-white p-6">
            <h1 class="text-3xl font-bold">{{ $clinic->name }}</h1>
        </div>
        
        <div class="p-6">
            <div class="space-y-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <p class="text-gray-700">
                        <span class="font-semibold">Address:</span> 
                        {{ $clinic->address ?: 'Not provided' }}
                    </p>
                </div>
                
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <p class="text-gray-700">
                        <span class="font-semibold">Phone:</span> 
                        {{ $clinic->phone ?: 'Not provided' }}
                    </p>
                </div>
            </div>

            <div class="mt-6 flex space-x-4">
                <a 
                    href="{{ route('clinics.edit', $clinic->id) }}" 
                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition duration-300 ease-in-out flex items-center"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                        <path fill-rule="evenodd" d="M2 16V6h4V4H2a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2v-4h-2v4H2z" clip-rule="evenodd" />
                    </svg>
                    Edit
                </a>
                
                <form 
                    action="{{ route('clinics.destroy', $clinic->id) }}" 
                    method="POST" 
                    class="inline"
                    onsubmit="return confirm('Are you sure you want to delete this clinic?');"
                >
                    @csrf
                    @method('DELETE')
                    <button 
                        type="submit" 
                        class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-300 ease-in-out flex items-center"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h2 class="text-xl font-semibold mb-4">Clinic Navigation</h2>
        <ul class="space-y-2">
            <li><a href="{{ route('doctors.index', $clinic->id) }}" class="text-blue-500 hover:underline">Doctors</a></li>
            <li><a href="{{ route('patients.index', $clinic->id) }}" class="text-blue-500 hover:underline">Patients</a></li>
            <li><a href="{{ route('appointments.index', $clinic->id) }}" class="text-blue-500 hover:underline">Appointments</a></li>
            <li><a href="{{ route('medical_records.index', $clinic->id) }}" class="text-blue-500 hover:underline">Medical Records</a></li>
        </ul>
    </div>

    <!-- Optional: Display clinic details -->
    <div class="mt-6">
        <p class="text-gray-700">{{ $clinic->description }}</p>
    </div>
</div>
@endsection