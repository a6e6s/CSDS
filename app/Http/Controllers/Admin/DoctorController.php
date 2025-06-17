<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\City;
use App\Models\Hospital;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->input()['reset']))  return redirect()->route('doctors.index');
        $doctors = Doctor::with('specialty')->where(function ($query) use ($request) {
            if (isset($request->input()['search']['name'])) $query->where('name', 'like', "%" . $request->input()['search']['name'] . "%");
        })->where(function ($query) use ($request) {
            if (isset($request->input()['search']['status'])) $query->where('status', $request->input()['search']['status']);
        })->paginate(40);
        return view('admin.doctors.index', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctors.create', [
            'specialties' => Specialty::where('status', 1)->get(['name', 'id']),
            'hospitals' => Hospital::where('status', 1)->get(['name', 'id']),
            'cities' => City::where('status', 1)->get(['name', 'id']),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDoctorRequest $request)
    {

        $data = $request->input();
        $data['password'] = Hash::make($request->password);
        if ($request->hasfile('image')) {
            $data['image'] = 'image_' . rand(1000, 9999) . '.' . $request->file('image')->extension();
            $request->file('image')->move(storage_path() . '/app/public/images/doctors/', $data['image']);
        }
        if (Doctor::create($data)) {
            return redirect()->route('doctors.index')->with('success',  __('Your form saved successfully'));
        } else {
            return redirect()->back()->with('error',  __('Error occurred while we trying to store your data. please try again'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        return view('admin.doctors.edit', ['doctor' => $doctor]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Doctor $doctor)
    {
        return view('admin.doctors.edit', [
            'specialties' => Specialty::where('status', 1)->get(['name', 'id']),
            'hospitals' => Hospital::where('status', 1)->get(['name', 'id']),
            'cities' => City::where('status', 1)->get(['name', 'id']),
            'doctor' => $doctor
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorRequest $request, Doctor $doctor)
    {
        $data = $request->validated();
        if (!$request->password) unset($data['password']);
        if ($request->password) $data['password'] = Hash::make($request->password);
        if ($request->hasfile('image')) {
            $data['image'] = 'image_' . rand(1000, 9999) . '.' . $request->file('image')->extension();
            $request->file('image')->move(storage_path() . '/app/public/images/doctors/', $data['image']);
        }
        if (!$doctor->update($data)) {
            return redirect()->back()->with('error',  __('Error occurred while we trying to store your data. please try again'));
        }
        return redirect()->route('doctors.index')->with('success',  __('Your form saved successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Doctor $doctor)
    {
        if ($doctor->delete()) {
            return redirect()->route('doctors.index')->with('success',  __('Deleted successfully'));
        } else {
            return redirect()->back()->with('error', __('Error occurred while deleting. Please try again'));
        }
    }

    /**
     * update multiable record .
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function actions(Request $request)
    {
        // dd($request->input());
        if ($request->activate) {
            $result = Doctor::where('id', $request->id)->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->block) {
            $result = Doctor::where('id', $request->id)->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->blockAll) {
            $result = Doctor::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->ActivateAll) {
            $result = Doctor::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->DeleteAll) {
            $result = Doctor::whereIn('id', json_decode($request->allrecords, true))->delete();
            $result .= " - Deleted successfully.";
        }
        if ($result) {
            return redirect()->back()->with('success',  $result);
        } else {
            return redirect()->back()->with('error', 'Error occurred . Please try again');
        }
    }
}
