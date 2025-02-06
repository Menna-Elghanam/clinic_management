<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function index()
    {
        $clinics = Clinic::with('doctors')->get();
        return view('clinics.index', compact('clinics'));
    }

    public function create()
    {
        return view('clinics.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
        ]);

        Clinic::create($validated);
        return redirect()->route('clinics.index')->with('success', 'Clinic created successfully!');
    }

    public function show($id)
    {
        $clinic = Clinic::with('doctors')->findOrFail($id);
        return view('clinics.show', compact('clinic'));
    }

    public function edit($id)
    {
        $clinic = Clinic::findOrFail($id);
        return view('clinics.edit', compact('clinic'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
        ]);

        $clinic = Clinic::findOrFail($id);
        $clinic->update($validated);
        return redirect()->route('clinics.index')->with('success', 'Clinic updated successfully!');
    }

    public function destroy($id)
    {
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();
        return redirect()->route('clinics.index')->with('success', 'Clinic deleted successfully!');
    }
}
