<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /**
     * Display a listing of the clinics.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all clinics with their doctors
        $clinics = Clinic::with('doctors')->get();

        // Return the clinics index view with data
        return view('clinics.index', compact('clinics'));
    }

    /**
     * Show the form for creating a new clinic.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the form to create a new clinic
        return view('clinics.create');
    }

    /**
     * Store a newly created clinic in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
        ]);

        // Create a new clinic with the validated data
        Clinic::create($validated);

        // Redirect to the clinics list with success message
        return redirect()->route('clinics.index')->with('success', 'Clinic created successfully!');
    }

    /**
     * Display the specified clinic.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Find the clinic by ID
        $clinic = Clinic::with('doctors')->findOrFail($id);

        // Return the clinic details view
        return view('clinics.show', compact('clinic'));
    }

    /**
     * Show the form for editing the specified clinic.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Find the clinic by ID
        $clinic = Clinic::findOrFail($id);

        // Return the edit form
        return view('clinics.edit', compact('clinic'));
    }

    /**
     * Update the specified clinic in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'phone' => 'nullable|string|max:15',
        ]);

        // Find the clinic and update it
        $clinic = Clinic::findOrFail($id);
        $clinic->update($validated);

        // Redirect to clinics list with success message
        return redirect()->route('clinics.index')->with('success', 'Clinic updated successfully!');
    }

    /**
     * Remove the specified clinic from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Find the clinic by ID and delete it
        $clinic = Clinic::findOrFail($id);
        $clinic->delete();

        // Redirect with success message
        return redirect()->route('clinics.index')->with('success', 'Clinic deleted successfully!');
    }
}
