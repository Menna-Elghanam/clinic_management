<?php


namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Clinic;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Clinic $clinic)
    {
        // Get appointments for the specified clinic
        $appointments = Appointment::whereHas('patient', function ($query) use ($clinic) {
            $query->where('clinic_id', $clinic->id);
        })->get();

        // Pass the clinic and appointments to the view
        return view('appointments.index', compact('appointments', 'clinic'));
    }

    // App\Http\Controllers\AppointmentController.php
public function create($clinic_id)
{
    $clinic = Clinic::findOrFail($clinic_id);
    $doctors = $clinic->doctors;  // This should fetch doctors associated with the clinic
    return view('appointments.create', compact('clinic', 'doctors'));
}


    public function store(Request $request, Clinic $clinic)
    {
        // Validate the input data
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
        ]);

        // Create a new appointment for the specified clinic
        Appointment::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'appointment_date' => $request->appointment_date,
            'clinic_id' => $clinic->id,  // Make sure this is linked to the clinic
        ]);

        // Redirect to the appointments index for the clinic
        return redirect()->route('appointments.index', $clinic->id);
    }

    public function show(Clinic $clinic, Appointment $appointment)
    {
        // Pass the appointment to the view
        return view('appointments.show', compact('appointment'));
    }
}
