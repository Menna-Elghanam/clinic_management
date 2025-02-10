@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200">
                <h1 class="text-xl font-semibold text-gray-800">Edit Patient</h1>
            </div>
            <form action="{{ route('patients.update', ['clinic' => $clinic->id, 'patient' => $patient->id]) }}" method="POST" class="px-6 py-4 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Name</label>
                    <input type="text" name="name" value="{{ old('name', $patient->name) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', $patient->email) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-1">Phone</label>
                    <input type="text" name="phone" value="{{ old('phone', $patient->phone) }}" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('patients.index', $clinic->id) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">Cancel</a>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection