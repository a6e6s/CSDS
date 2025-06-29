<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialty;
use App\Http\Requests\StoreSpecialtyRequest;
use App\Http\Requests\UpdateSpecialtyRequest;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->input()['reset']))  return redirect()->route('specialties.index');
        $specialties = Specialty::where(function ($query) use ($request) {
            if (isset($request->input()['search']['name'])) $query->where('name', 'like', "%" . $request->input()['search']['name'] . "%");
        })->where(function ($query) use ($request) {
            if (isset($request->input()['search']['status'])) $query->where('status', $request->input()['search']['status']);
        })->paginate(50);
        // dd($specialties);
        return view('admin.specialties.index', ['specialties' => $specialties]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.specialties.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecialtyRequest $request)
    {
        $data = $request->input();

        if ($request->hasfile('logo')) {
            $data['logo'] = 'logo_' . rand(1000, 9999) . '.' . $request->file('logo')->extension();
            $request->file('logo')->move(storage_path() . '/app/public/images/specialties/', $data['logo']);
        }
        if (Specialty::create($data)) {
            return redirect()->route('specialties.index')->with('success',  __('Your form saved successfully'));
        } else {
            return redirect()->back()->with('error',  __('Error occurred while we trying to store your data. please try again'));
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specialty $specialty)
    {
        return view('admin.specialties.edit', ['specialty' => $specialty]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSpecialtyRequest $request, Specialty $specialty)
    {
        $data = $request->validated();
        if ($request->hasfile('logo')) {
            $data['logo'] = 'logo_' . rand(1000, 9999) . '.' . $request->file('logo')->extension();
            $request->file('logo')->move(storage_path() . '/app/public/images/specialties/', $data['logo']);
        }
        if (!$specialty->update($data)) {
            return redirect()->back()->with('error',  __('Error occurred while we trying to store your data. please try again'));
        }
        return redirect()->route('specialties.index')->with('success',  __('Your form saved successfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specialty $specialty)
    {
        if ($specialty->delete()) {
            return redirect()->route('specialties.index')->with('success',  __('Deleted successfully'));
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
            $result = Specialty::where('id', $request->id)->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->block) {
            $result = Specialty::where('id', $request->id)->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->blockAll) {
            $result = Specialty::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->ActivateAll) {
            $result = Specialty::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->DeleteAll) {
            $result = Specialty::whereIn('id', json_decode($request->allrecords, true))->delete();
            $result .= " - Deleted successfully.";
        }
        if ($result) {
            return redirect()->back()->with('success',  $result);
        } else {
            return redirect()->back()->with('error', 'Error occurred . Please try again');
        }
    }
}
