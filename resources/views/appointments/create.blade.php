@extends('layouts.app')

@section('content')
    <h1>Create Appointment for {{ $clinic->name }}</h1>

    <!-- Form to create a new appointment -->
    <form action="{{ route('appointments.store', $clinic->id) }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="patient_id">Patient</label>
            <select name="patient_id" id="patient_id" class="form-control" required>
                <option value="">Select Patient</option>
                @foreach ($clinic->patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="doctor_id">Doctor</label>
            <select name="doctor_id" id="doctor_id" class="form-control" required>
                <option value="">Select Doctor</option>
                @foreach ($doctors as $doctor)
                    <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="appointment_date">Appointment Date</label>
            <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create Appointment</button>
    </form>
    
    <a href="{{ route('appointments.index', $clinic->id) }}" class="btn btn-secondary mt-3">Back to Appointments</a>
@endsection
