@extends('layouts.app')

@section('content')
    <h1>Appointments for {{ $clinic->name }}</h1> <!-- Display the clinic name -->
    <a href="{{ route('appointments.create', $clinic->id) }}" class="btn btn-primary">Create Appointment</a>
    <table class="table">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Appointment Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->patient->name }}</td>
                    <td>{{ $appointment->doctor->name }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>
                        <a href="{{ route('appointments.show', [$clinic->id, $appointment->id]) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
