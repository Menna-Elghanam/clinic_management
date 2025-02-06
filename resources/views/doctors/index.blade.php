@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold">Doctors List</h1>
    <a href="{{ route('doctors.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-2 inline-block">Add Doctor</a>
    
    @if(session('success'))
        <p class="bg-green-300 text-green-800 p-2 rounded mt-2">{{ session('success') }}</p>
    @endif

    <table class="w-full mt-4 border-collapse border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">Name</th>
                <th class="border p-2">Specialization</th>
                <th class="border p-2">Clinic</th>
                <th class="border p-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($doctors as $doctor)
            <tr class="border">
                <td class="border p-2">{{ $doctor->name }}</td>
                <td class="border p-2">{{ $doctor->specialization }}</td>
                <td class="border p-2">{{ $doctor->clinic->name ?? 'No Clinic' }}</td>
                <td class="border p-2">
                    <a href="{{ route('doctors.show', $doctor) }}" class="text-blue-600">View</a> | 
                    <a href="{{ route('doctors.edit', $doctor) }}" class="text-yellow-600">Edit</a> | 
                    <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
