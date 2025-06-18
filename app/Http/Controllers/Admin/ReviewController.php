<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (isset($request->input()['reset']))  return redirect()->route('reviews.index');
        $reviews = Review::with(['doctor', 'user'])->where(function ($query) use ($request) {
            if (isset($request->input()['search']['name'])) $query->where('name', 'like', "%" . $request->input()['search']['name'] . "%");
        })->where(function ($query) use ($request) {
            if (isset($request->input()['search']['status'])) $query->where('status', $request->input()['search']['status']);
        })->paginate(20);
        return view('admin.reviews.index', ['reviews' => $reviews]);
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
    public function store(StoreReviewRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {

        $review->update(['status' => 1]);
        return view('admin.reviews.show', ['review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        if ($review->delete()) {
            return redirect()->route('reviews.index')->with('success',  __('Deleted successfully'));
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
            $result = Review::where('id', $request->id)->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->block) {
            $result = Review::where('id', $request->id)->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->blockAll) {
            $result = Review::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 0]);
            $result .= " - Blocked successfully.";
        }
        if ($request->ActivateAll) {
            $result = Review::whereIn('id', json_decode($request->allrecords, true))->update(['status' => 1]);
            $result .= " - Activated successfully.";
        }
        if ($request->DeleteAll) {
            $result = Review::whereIn('id', json_decode($request->allrecords, true))->delete();
            $result .= " - Deleted successfully.";
        }
        if ($result) {
            return redirect()->back()->with('success',  $result);
        } else {
            return redirect()->back()->with('error', 'Error occurred . Please try again');
        }
    }
}
