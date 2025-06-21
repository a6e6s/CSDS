<?php

namespace App\Http\Controllers;

use App\Models\AvailableAppointment;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // dd($request->all());
        $request->validate([
            'offer_id' => 'required_without:appointment_id|exists:offers,id',
            'appointment_id' => 'required_without:offer_id|exists:available_appointments,id',
            'contact' => 'required',
            'patient' => 'required',
            'notes' => 'nullable'
        ]);
        if ($request->appointment_id) {
            $appointment = AvailableAppointment::find($request->appointment_id);
            $date = $appointment->date->format('Y-m-d');
            $time = $appointment->date->format('H:i:s');
        } else {
            $date = null;
            $time = null;
        }
        $order = [
            'user_id' => Auth::user()->id,
            'offer_id' => $request->offer_id,
            'appointment_id' => $request->appointment_id,
            'contact' => $request->contact,
            'patient' => $request->patient,
            'notes' => $request->notes,
            'date' => $date,
            'time' => $time,
            'status' => 0,
        ];
        if (Order::create($order)) {
            return redirect()->back()->with('success', 'تم تقديم طلبك بنجاح');
        } else {
            return redirect()->back()->with('error', 'حدث خطأ ما');
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
