<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use Illuminate\Http\Request;
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->input()['reset']))  return redirect()->route('pages.index');
        $pages = Page::where(function ($query) use ($request) {
            if (isset($request->input()['search']['title'])) $query->where('title', 'like', "%" . $request->input()['search']['title'] . "%");
        })->where(function ($query) use ($request) {
            if (isset($request->input()['search']['status'])) $query->where('status', $request->input()['search']['status']);
        })->paginate(20);
        return view('admin.pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePageRequest $request)
    {
        $data = $request->input();
        if ($request->hasfile('banner')) {
            $data['image'] = 'banner_' . Str::random(6) . '.' . $request->file('banner')->extension();
            $request->file('banner')->move(storage_path() . '/app/public/images/pages/', $data['image']);
        }
        if (Page::create($data)) {
            return redirect()->route('pages.index')->with('success',  __('Your form saved successfully'));
        } else {
            return redirect()->back()->with('error',  __('Error occurred while we trying to store your data. please try again'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', ['page' => $page]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePageRequest $request, Page $page)
    {
        $data = $request->input();
        if ($request->hasfile('banner')) {
            $data['image'] = 'banner_' . Str::random(6) . '.' . $request->file('banner')->extension();
            $request->file('banner')->move(storage_path() . '/app/public/images/pages/', $data['image']);
        }
        // dd($data);
        if ($page->update($data)) {
            return redirect()->route('pages.index')->with('success',  __('Your form saved successfully'));
        } else {
            return redirect()->back()->with('error',  __('Error occurred while we trying to store your data. please try again'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        if ($page->delete()) {
            return redirect()->route('pages.index')->with('success',  __('Deleted successfully'));
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
            $result = Page::where('id', $request->id)->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->block) {
            $result = Page::where('id', $request->id)->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->blockAll) {
            $result = Page::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->ActivateAll) {
            $result = Page::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->DeleteAll) {
            $result = Page::whereIn('id', json_decode($request->allrecords, true))->delete();
            $result .= " - Activated successfully.";
        }
        if ($result) {
            return redirect()->back()->with('success',  $result);
        } else {
            return redirect()->back()->with('error', 'Error occurred . Please try again');
        }
    }
}
