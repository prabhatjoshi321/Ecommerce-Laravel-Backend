<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\reviews;
use Illuminate\Http\Request;
use Auth;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function review_index()
    {
        $user_id = Auth::user()->id;

        return response()->json([
            'data' => reviews::where('user_id', $user_id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate([
            'product_id' => 'required',
            'stars' => 'required',
            'rev_subject' => 'required',
            'rev_content' => 'required',
        ]);

        $review = new Reviews([
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
            'product_id' => $request->product_id,
            'stars' => $request->stars,
            'rev_subject' => $request->rev_subject,
            'rev_content' => $request->rev_content,
        ]);

        $review->save();

        return response()->json([
            'message' => 'Review Submitted',
        ],201);

    }

    public function product_review(Request $request)
    {
        $request -> validate([
            'id' => 'required',
        ]);

        return response()->json([
            'data' => reviews::where('product_id', $request->id)->get(),
        ],201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function show(reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function edit(reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, reviews $reviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reviews  $reviews
     * @return \Illuminate\Http\Response
     */
    public function destroy(reviews $reviews)
    {
        //
    }
}
