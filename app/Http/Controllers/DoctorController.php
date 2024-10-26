<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();

        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hospitals = Hospital::all();

        return view('doctors.create', compact('hospitals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'first_name' => 'required',
        ]);

        Doctor::create($request->all());

        return redirect()->route('doctors.index')->with('success','Doctor added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        $hospitals = Hospital::all();

        return view('doctors.edit', compact('doctor','hospitals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $doctor->update($request->all());

        return redirect()->route('doctors.index')->with('success','doctor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.index')->with('success','doctor deleted successfully!');
    }
}
