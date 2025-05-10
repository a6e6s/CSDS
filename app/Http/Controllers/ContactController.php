<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home.contact.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required',
        ]);
        Contact::create($request->all(), ['status' => 0]);
        return redirect()->back()->with('success', 'تم ارسال رسالتك بنجاح.');
    }
}
