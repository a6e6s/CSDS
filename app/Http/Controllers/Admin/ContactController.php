<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->input()['reset']))  return redirect()->route('contacts.index');
        $contacts = Contact::where(function ($query) use ($request) {
            if (isset($request->input()['search']['name'])) $query->where('name', 'like', "%" . $request->input()['search']['name'] . "%");
        })->where(function ($query) use ($request) {
            if (isset($request->input()['search']['status'])) $query->where('status', $request->input()['search']['status']);
        })->paginate(20);
        return view('admin.contacts.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        $contact->update(['status' => 1]);
        return view('admin.contacts.show', ['contact' => $contact]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        if ($contact->delete()) {
            return redirect()->route('contacts.index')->with('success',  __('Deleted successfully'));
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
        if ($request->activate) {
            $result = Contact::where('id', $request->id)->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->block) {
            $result = Contact::where('id', $request->id)->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->blockAll) {
            $result = Contact::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->ActivateAll) {
            $result = Contact::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->DeleteAll) {
            $result = Contact::whereIn('id', json_decode($request->allrecords, true))->delete();
            $result .= " - Activated successfully.";
        }
        if ($result) {
            return redirect()->back()->with('success',  $result);
        } else {
            return redirect()->back()->with('error', 'Error occurred . Please try again');
        }
    }
}
