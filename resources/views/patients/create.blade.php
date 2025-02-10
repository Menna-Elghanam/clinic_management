@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-6">Add a New Patient to Clinic: {{ $clinic->name }}</h1>

        <form action="{{ route('patients.store', $clinic->id) }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-600 mb-1">Name:</label>
                <input type="text" name="name" id="name" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600 mb-1">Email:</label>
                <input type="email" name="email" id="email" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-600 mb-1">Phone:</label>
                <input type="text" name="phone" id="phone" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('patients.index', $clinic->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Back to Patient List</a>
                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Save Patient</button>
            </div>
        </form>
    </div>
</div>
@endsection