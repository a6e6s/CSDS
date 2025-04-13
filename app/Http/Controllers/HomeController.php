<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Offer;
use App\Models\Slide;
use App\Models\Specialty;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $slides =  Slide::where('status', 1)->get();
        $doctors =  Doctor::where('status', 1)->get();
        $offers =  Offer::where('status', 1)->orderBy('created_at', 'DESC')->take(4)->get();
        $clinics =  Specialty::where('status', 1)->take(6)->get();
        $settings =  collect([]);
        return view('home.index', [ 'slides' => $slides, 'clinics' => $clinics, 'doctors' => $doctors, 'offers' => $offers, 'settings' => $settings]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
