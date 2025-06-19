<?php

namespace App\Http\Controllers;

use App\Models\City;
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
        $doctors =  Doctor::where('status', 1)->take(10)->get(['id', 'name', 'image']);
        $offers =  Offer::where('status', 1)->orderBy('created_at', 'DESC')->take(4)->get();
        $specialties =  Specialty::where('status', 1)->take(6)->get();
        $cities =  City::where('status', 1)->get(['id', 'name']);
        $settings =  collect([]);
        return view('home.index', ['slides' => $slides, 'specialties' => $specialties, 'doctors' => $doctors, 'offers' => $offers, 'cities' => $cities, 'settings' => $settings]);
    }

}
