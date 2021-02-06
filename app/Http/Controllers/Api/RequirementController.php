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
            'rental_sale_condition' => 'required',
            'purchase_mode' => 'required',
            'cash_amount' => 'required',
            'loan_amount' => 'required',
            'property_type' => 'required',
            'requirement' => 'required',
        ]);

        $requirement = new Requirement([
            'user_id' => $request->user_id,
            'rental_sale_condition' => $request->rental_sale_condition,
            'purchase_mode' => $request->purchase_mode,
            'cash_amount' => $request->cash_amount,
            'loan_amount' => $request->loan_amount,
            'property_type' => $request->property_type,
            'requirement' => $request->requirement
        ]);

        $requirement->save();

        return response()->json([
            'message' => 'Successfully inserted requirement',
            'data' => $requirement
        ], 201);
    }


    public function reqHandler(REquest $request)
    {
        $request -> validate([
            'user_id' => 'required',
        ]);

        $query = $request->user_id;

        $requirements = requirement::Where('user_id', 'like', '%' . $query . '%');

        $requirements = $requirements->paginate(4000);

        return response() -> json([
            'requirements' => $requirements,
        ]);

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
