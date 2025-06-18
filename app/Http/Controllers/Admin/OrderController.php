<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->input()['reset']))  return redirect()->route('orders.index');
        $orders = Order::with(['appointment.doctor', 'user'])->where(function ($query) use ($request) {
            if (isset($request->input()['search']['name'])) $query->where('name', 'like', "%" . $request->input()['search']['name'] . "%");
        })->where(function ($query) use ($request) {
            if (isset($request->input()['search']['status'])) $query->where('status', $request->input()['search']['status']);
        })->paginate(20);
        // dd($orders);
        return view('admin.orders.index', ['orders' => $orders]);
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
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {

        $order->update(['status' => 1]);
        return view('admin.orders.show', ['order' => $order]);
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
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $contact)
    {
        if ($contact->delete()) {
            return redirect()->route('orders.index')->with('success',  __('Deleted successfully'));
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
            $result = Order::where('id', $request->id)->update(['status' => 1]);
            $result .= " - Confirmed successfully.";
        }
        if ($request->block) {
            $result = Order::where('id', $request->id)->update(['status' => 0]);
            $result .= " - Canceled successfully.";
        }
        if ($request->blockAll) {
            $result = Order::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 0]);
            $result .= " - Canceled successfully.";
        }
        if ($request->ActivateAll) {
            $result = Order::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 1]);
            $result .= " - Confirmed successfully.";
        }
        if ($request->DeleteAll) {
            $result = Order::whereIn('id', json_decode($request->allrecords, true))->delete();
            $result .= " - Deleted successfully.";
        }
        if ($result) {
            return redirect()->back()->with('success',  $result);
        } else {
            return redirect()->back()->with('error', 'Error occurred . Please try again');
        }
    }
}
