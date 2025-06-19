<?php

namespace App\Http\Controllers;

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

        $order = [
            'user_id' => Auth::user()->id,
            'offer_id' => $request->offer_id,
            'contact' => $request->contact,
            'patient' => $request->patient,
            'notes' => $request->notes,
            'status' => 0,
        ];
        if (Order::create($order)) {
            return redirect()->back()->with('success', 'تم تقديم طلبك بنجاح');
        }else{
            return redirect()->back()->with('error', 'حدث خطأ ما');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
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
