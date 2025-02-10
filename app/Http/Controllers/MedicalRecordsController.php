<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecords;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Clinic;  // Add the Clinic model
use Illuminate\Http\Request;

class MedicalRecordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function index(Clinic $clinic)
    {
        // Get medical records for a specific clinic
        $records = MedicalRecords::with(['patient', 'doctor'])
                                 ->whereHas('patient', function($query) use ($clinic) {
                                     $query->where('clinic_id', $clinic->id); // Assuming a relationship between patients and clinics
                                 })
                                 ->get();
        return view('medical_records.index', compact('records', 'clinic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param \App\Models\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function create(Clinic $clinic)
    {
        $patients = Patient::where('clinic_id', $clinic->id)->get(); // Get patients for the specific clinic
        $doctors = Doctor::where('clinic_id', $clinic->id)->get();   // Get doctors for the specific clinic
        return view('medical_records.create', compact('patients', 'doctors', 'clinic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clinic $clinic
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Clinic $clinic)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $medicalRecord = new MedicalRecords($request->all());
        $medicalRecord->clinic_id = $clinic->id;  // Attach the clinic ID
        $medicalRecord->save();

        return redirect()->route('medical_records.index', $clinic->id)->with('success', 'Medical Record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Clinic $clinic
     * @param \App\Models\MedicalRecords $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function show(Clinic $clinic, MedicalRecords $medicalRecord)
    {
        return view('medical_records.show', compact('medicalRecord', 'clinic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Clinic $clinic
     * @param \App\Models\MedicalRecords $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(Clinic $clinic, MedicalRecords $medicalRecord)
    {
        $patients = Patient::where('clinic_id', $clinic->id)->get(); // Get patients for the specific clinic
        $doctors = Doctor::where('clinic_id', $clinic->id)->get();   // Get doctors for the specific clinic
        return view('medical_records.edit', compact('medicalRecord', 'patients', 'doctors', 'clinic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Clinic $clinic
     * @param \App\Models\MedicalRecords $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clinic $clinic, MedicalRecords $medicalRecord)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'doctor_id' => 'required|exists:doctors,id',
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        $medicalRecord->update($request->all());

        return redirect()->route('medical_records.index', $clinic->id)->with('success', 'Medical record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Clinic $clinic
     * @param \App\Models\MedicalRecords $medicalRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clinic $clinic, MedicalRecords $medicalRecord)
    {
        $medicalRecord->delete();

        return redirect()->route('medical_records.index', $clinic->id)
            ->with('success', 'Medical record deleted successfully.');
    }
}
