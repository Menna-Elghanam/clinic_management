@extends('layouts.app')

@section('content')
    <h1>Appointment Details</h1>

    <div class="card">
        <div class="card-header">
            Appointment Information
        </div>
        <div class="card-body">
            <h5 class="card-title">Patient: {{ $appointment->patient->name }}</h5>
            <p class="card-text"><strong>Doctor:</strong> {{ $appointment->doctor->name }}</p>
            <p class="card-text"><strong>Appointment Date:</strong> {{ $appointment->appointment_date }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $appointment->status ?? 'Not set' }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('appointments.index', $appointment->patient->clinic_id) }}" class="btn btn-secondary">Back to Appointments</a>
    </div>
@endsection
