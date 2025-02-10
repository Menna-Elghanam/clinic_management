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

public function create($clinic_id)
{
    $clinic = Clinic::findOrFail($clinic_id);
    $doctors = $clinic->doctors;  
    return view('appointments.create', compact('clinic', 'doctors'))->with('success', "Appointment created successfully!");
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
        return redirect()->route('appointments.index', $clinic->id)->with('success', 'Appointment created successfully.');
    }

    public function show(Clinic $clinic, Appointment $appointment)
    {
        // Pass the appointment to the view
        return view('appointments.show', compact('appointment'));
    }

    public function edit(Clinic $clinic, Appointment $appointment)
    {
        $doctors = $clinic->doctors;
        $patients = $clinic->patients;
        return view('appointments.edit', compact('clinic', 'appointment', 'doctors', 'patients'));
    }

    public function update(Request $request, Clinic $clinic, Appointment $appointment)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:scheduled,completed,cancelled,pending',
        ]);

        $appointment->update($validated);

        return redirect()
            ->route('appointments.index', [$clinic->id, $appointment->id])
            ->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Clinic $clinic, Appointment $appointment)
    {
        $appointment->delete();

        return redirect()
            ->route('appointments.index', $clinic->id)
            ->with('success', 'Appointment cancelled successfully.');
    }
}
