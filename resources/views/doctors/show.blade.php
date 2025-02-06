@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg p-6">
    <h1 class="text-2xl font-bold text-gray-900">{{ $doctor->name }}</h1>
    <p class="text-gray-700 text-lg">Specialization: {{ $doctor->specialization }}</p>

    <h2 class="mt-4 text-xl font-semibold text-gray-800">Clinic Information</h2>
    <p class="text-gray-700">Clinic: {{ $doctor->clinic->name ?? 'N/A' }}</p>

    <h2 class="mt-4 text-xl font-semibold text-gray-800">Appointments</h2>
    <ul class="list-disc pl-6">
        @foreach ($doctor->appointments as $appointment)
            <li class="text-gray-700">
                {{ $appointment->date }} - {{ $appointment->patient_name ?? 'No Name' }}
            </li>
        @endforeach
    </ul>

    <a href="{{ route('doctors.index') }}" class="inline-block mt-4 px-4 py-2 bg-blue-500 text-white rounded-lg">
        Back to Doctors List
    </a>
</div>
@endsection
