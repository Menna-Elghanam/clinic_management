<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Clinic;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::with('clinic')->get();
        return view('doctors.index', compact('doctors'));
    }

    public function create()
    {
        $clinics = Clinic::all();
        return view('doctors.create', compact('clinics'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'clinic_id' => 'required|exists:clinics,id',
        ]);

        Doctor::create($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor added successfully');
    }

    public function show(Doctor $doctor)
    {
        return view('doctors.show', compact('doctor'));
    }

    public function edit(Doctor $doctor)
    {
        $clinics = Clinic::all();
        return view('doctors.edit', compact('doctor', 'clinics'));
    }

    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'clinic_id' => 'required|exists:clinics,id',
        ]);

        $doctor->update($request->all());
        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully');
    }

    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully');
    }
}
