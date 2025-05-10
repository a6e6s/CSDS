<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Http\Requests\StoreSlideRequest;
use App\Http\Requests\UpdateSlideRequest;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->input()['reset']))  return redirect()->route('slides.index');
        $slides = Slide::where(function ($query) use ($request) {
            if (isset($request->input()['search']['title'])) $query->where('title', 'like', "%" . $request->input()['search']['title'] . "%");
        })->where(function ($query) use ($request) {
            if (isset($request->input()['search']['status'])) $query->where('status', $request->input()['search']['status']);
        })->paginate(20);
        return view('admin.slides.index', ['slides' => $slides]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slides.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSlideRequest $request)
    {
        $data = $request->input();

        if ($request->hasfile('slide')) {
            $data['image'] = 'slide_' . rand(1000, 9999) . '.' . $request->file('slide')->extension();
            $request->file('slide')->move(storage_path() . '/app/public/images/slides/', $data['image']);
        }
        if (Slide::create($data)) {
            return redirect()->route('slides.index')->with('success',  __('Your form saved successfully'));
        } else {
            return redirect()->back()->with('error',  __('Error occurred while we trying to store your data. please try again'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        return view('admin.slides.edit', ['slide' => $slide]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSlideRequest $request, Slide $slide)
    {
        $data = $request->input();
        if ($request->hasfile('slide')) {
            $data['image'] = 'slide_' . rand(1000, 9999) . '.' . $request->file('slide')->extension();
            $request->file('slide')->move(storage_path() . '/app/public/images/slides/', $data['image']);
        }
        // dd($data);
        if ($slide->update($data)) {
            return redirect()->route('slides.index')->with('success',  __('Your form saved successfully'));
        } else {
            return redirect()->back()->with('error',  __('Error occurred while we trying to store your data. please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        if ($slide->delete()) {
            return redirect()->back()->with('success',  __('Deleted successfully'));
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
            $result = Slide::where('id', $request->id)->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->block) {
            $result = Slide::where('id', $request->id)->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->blockAll) {
            $result = Slide::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->ActivateAll) {
            $result = Slide::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->DeleteAll) {
            $result = Slide::whereIn('id', json_decode($request->allrecords, true))->delete();
            $result .= " - Activated successfully.";
        }
        if ($result) {
            return redirect()->back()->with('success',  $result);
        } else {
            return redirect()->back()->with('error', 'Error occurred . Please try again');
        }
    }
}
