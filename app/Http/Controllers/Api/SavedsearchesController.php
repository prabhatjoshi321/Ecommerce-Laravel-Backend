<?php

namespace App\Http\Controllers\Api;

use App\Models\savedsearches;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Database\Seeders\SavedsearchesSeeder;

class SavedsearchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $id = $request->user_id;

        $products = DB::table('savedsearches')->select('product_id')->where('user_id', $id)->value("value");

        return response() -> json ([
            'data' => $products
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
        $request->validate([
            'user_id' => 'required',
            'product_id' => 'required'
        ]);

        $saved_searches = new Savedsearches([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id
        ]);

        $saved_searches -> save();

        return response() -> json ([
            'message' => 'successfull'
        ], 201);

    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\savedsearches  $savedsearches
     * @return \Illuminate\Http\Response
     */
    public function show(savedsearches $savedsearches)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\savedsearches  $savedsearches
     * @return \Illuminate\Http\Response
     */
    public function edit(savedsearches $savedsearches)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\savedsearches  $savedsearches
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, savedsearches $savedsearches)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\savedsearches  $savedsearches
     * @return \Illuminate\Http\Response
     */
    public function destroy(savedsearches $savedsearches)
    {
        //
    }
}
