<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Clinic;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Clinic $clinic)
    {
        $doctors = $clinic->doctors;
        return view('doctors.index', compact('clinic', 'doctors'));
    }

    public function create(Clinic $clinic)
    {
        return view('doctors.create', compact('clinic'));
    }

    public function store(Request $request, Clinic $clinic)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'clinic_id' => 'required|exists:clinics,id',
        ]);

        // Ensure the clinic ID is correctly passed during creation
        $doctor = new Doctor($request->all());
        $doctor->clinic_id = $clinic->id;
        $doctor->save();

        return redirect()->route('clinics.doctors.index', $clinic)->with('success', 'Doctor added successfully');
    }

    public function show(Clinic $clinic, Doctor $doctor)
    {
        return view('doctors.show', compact('clinic', 'doctor'));
    }

    public function edit(Clinic $clinic, Doctor $doctor)
    {
        $clinics = Clinic::all();  // To show a list of clinics in the edit form
        return view('doctors.edit', compact('clinic', 'doctor', 'clinics'));
    }

    public function update(Request $request, Clinic $clinic, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'specialization' => 'required|string|max:255',
            'clinic_id' => 'required|exists:clinics,id',
        ]);

        $doctor->update($request->all());
        return redirect()->route('doctors.index', $clinic)->with('success', 'Doctor updated successfully');
    }

    public function destroy(Clinic $clinic, Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index', $clinic)->with('success', 'Doctor deleted successfully');
    }
}
