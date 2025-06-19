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
        return view('home.doctors.index', ['doctors' => Doctor::with('specialty')->where('status', 1)->get()]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function search(Request $request)
    {
        // dd($request->doctor);
        $doctors = Doctor::where(function ($query) use ($request) {
            if($request->city_id) $query->where('city_id', $request->city_id);
            if($request->specialty_id) $query->where('specialty_id', $request->specialty_id);
            if($request->doctor) $query->whereLike('name', "%$request->doctor%");
        })->where('status', 1)->get();
        return view('home.doctors.search', ['doctors' => $doctors]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('home.doctors.show', ['doctor' => $doctor->with('hospital')->where('status', 1)->first()]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function hospital(Hospital $hospital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        //
    }
}
