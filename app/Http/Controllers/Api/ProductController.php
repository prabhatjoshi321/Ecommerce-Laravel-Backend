<?php

namespace App\Http\Controllers\Api;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Products::latest()->paginate(5);
        return view('store_image', compact('data'))
        ->with('i', (request()->input('page', 1) - 1)
        * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request -> validate([
            'username' => 'required',
            'email' => 'required|string|unique:users',
            'product_image' => 'required|image|max:2048',
            'address' => 'required',
            'city' => 'required',
            'rent_cond' => 'required',
            'rent_availability' => 'required',
            'maintenance_charge' => 'required',
            'ownership' => 'required',
            'locality' => 'required',
            'possessed_by' => 'required',
            'price' => 'required',
            'deposit' => 'required',
            'available_for' => 'required',
            'type' => 'required',
            'bedc_ount' => 'required',
            'bathroom' => 'required',
            'garage' => 'required',
            'garage_area' => 'required',
            'balconies' => 'required',
            'add_rooms' => 'required',
            'addons' => 'required',
            'buildyear' => 'required',
            'amenities' => 'required',
            'equipment' => 'required',
            'features' => 'required',
            'nearby_places' => 'required',
            'area' => 'required',
            'description' => 'required',
            'registration_status' => 'required',
        ]);

            $image_file = $request->product_image;
            $image = Image::make($image_file);

            Response::make($image->encode('jpeg'));

            $product_data = new Product([
                'username' => $request->username,
                'email' => $request->email,
                'product_image' => $image,
                'address' => $request->address,
                'city' => $request->city,
                'rent_cond' => $request->rent_cond,
                'rent_availability' => $request->rent_availability,
                'maintenance_charge' => $request->maintenance_charge,
                'ownership' => $request->ownership,
                'locality' => $request->locality,
                'possessed_by' => $request->possessed_by,
                'price' => $request->price,
                'deposit' => $request->deposit,
                'available_for' => $request->available_for,
                'type' => $request->type,
                'bedc_ount' => $request->bedc_ount,
                'bathroom' => $request->bathroom,
                'garage' => $request->garage,
                'garage_area' => $request->garage_area,
                'balconies' => $request->balconies,
                'add_rooms' => $request->add_rooms,
                'addons' => $request->addons,
                'buildyear' => $request->buildyear,
                'amenities' => $request->amenities,
                'equipment' => $request->equipment,
                'features' => $request->features,
                'nearby_places' => $request->nearby_places,
                'area' => $request->area,
                'description' => $request->description,
                'registration_status' => $request->registration_status,
            ]);

            //product::create($product_data);

            $product_data->save();

            return response()->json([
                'message' => 'Successfully inserted product'
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
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
