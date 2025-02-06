@extends('layouts.app')

@section('content')
    <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Edit Clinic</h1>
        
        <form action="{{ route('clinics.update', $clinic->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name" class="block text-gray-700 font-medium mb-2">Clinic Name</label>
                <input 
                    type="text" 
                    name="name" 
                    id="name"
                    value="{{ $clinic->name }}" 
                    placeholder="Enter clinic name" 
                    required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <div class="form-group">
                <label for="address" class="block text-gray-700 font-medium mb-2">Address</label>
                <input 
                    type="text" 
                    name="address" 
                    id="address"
                    value="{{ $clinic->address }}"
                    placeholder="Enter clinic address" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <div class="form-group">
                <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                <input 
                    type="text" 
                    name="phone" 
                    id="phone"
                    value="{{ $clinic->phone }}"
                    placeholder="Enter phone number" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                >
            </div>

            <div class="pt-4">
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50"
                >
                    Update Clinic
                </button>
            </div>
        </form>

        @if ($errors->any())
            <div class="mt-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
@endsection