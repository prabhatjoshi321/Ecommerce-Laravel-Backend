<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\requirement;
use Illuminate\Http\Request;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = requirement::latest()->paginate(100);
        return response()->json([
            'data'=> $data,
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request -> validate ([
            'user_id' => 'required',
            'requirement' => 'required',
        ]);

        $requirement = new Requirement([
            'user_id' => $request->user_id,
            'requirement' => $request->requirement
        ]);

        $requirement->save();

        return response()->json([
            'message' => 'Successfully inserted product',
            'data' => $requirement
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function show(requirement $requirement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function edit(requirement $requirement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, requirement $requirement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\requirement  $requirement
     * @return \Illuminate\Http\Response
     */
    public function destroy(requirement $requirement)
    {
        //
    }
}
