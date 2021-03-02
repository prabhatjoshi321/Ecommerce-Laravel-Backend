<?php

namespace App\Http\Controllers;

use App\Models\lawyer;
use App\Http\Controllers\controller;
use Illuminate\Http\Request;

class LawyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lawyer_index()
    {
        $data = lawyer::where('delete_flag' , 0)->Latest()->paginate();
        return response()->json([
            'data' => $data
        ], 201);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lawyer_create_service(Request $request)
    {
        $user_type = Auth::user()->usertype;

        if ($user_type == 4)
            return response()->json([
                'message' => 'Unauthorised User',
            ], 201);


        $request -> validate([
            'service_name',
            'service_details',
            'price'
        ]);

        $user_id = Auth::user()->id;

        $service = new Service([
            'user_id' => $user_id,
            'service_name' => $request->service_name,
            'service_details' => $request->service_details,
            'price' => $request->price
        ]);

        $service->save();

        return response()->json([
            'added_service' => $service
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
     * @param  \App\Models\lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function show(lawyer $lawyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function edit(lawyer $lawyer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lawyer $lawyer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lawyer  $lawyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(lawyer $lawyer)
    {
        //
    }
}
