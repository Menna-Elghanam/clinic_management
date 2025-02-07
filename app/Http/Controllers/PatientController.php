<?php


namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Clinic;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(Clinic $clinic)
    {
        $patients = $clinic->patients; // Fetch patients associated with the clinic
        return view('patients.index', compact('patients', 'clinic'));
    }
    

    public function create($clinic_id)
    {
        $clinic = Clinic::findOrFail($clinic_id);
        return view('patients.create', compact('clinic'));
    }

    public function store(Request $request, $clinic_id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:patients',
            'phone' => 'required',
        ]);

        $clinic = Clinic::findOrFail($clinic_id);
        Patient::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'clinic_id' => $clinic->id,
        ]);

        return redirect()->route('patients.index', $clinic->id);
    }

    public function show($clinic_id, $patient_id)
    {
        $patient = Patient::findOrFail($patient_id);
        return view('patients.show', compact('patient'));
    }
}
