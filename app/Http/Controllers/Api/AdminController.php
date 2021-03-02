<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\admin;
use Illuminate\Support\Facades\Storage;
use Auth;

use App\Models\User;
use App\Models\reviews;
use App\Models\savedsearches;
use App\Models\requirement;
use App\Models\product;
use App\Models\favourites;
use App\Models\last_searched_properties;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function user_update(Request $request)
    {
        $usertype = Auth::user()->usertype;

        if($usertype < 6){
            return response()->json([
                'unauthorised',
            ], 401);
        }

        $request -> validate([
        'id' => 'required' ,
        'name' => 'required' ,
        'profile_pic' => 'required' ,
        'company_name' => 'required' ,
        'company_url' => 'required' ,
        'address' => 'required' ,
        'city' => 'required' ,
        'other_mobile_number' => 'required' ,
        'landline_number' => 'required' ,
        'company_profile' => 'required' ,
        'pan_number' => 'required' ,
        'aadhar_number' => 'required' ,
        'provided_service' => 'required' ,
        'place_of_practice' => 'required' ,
        'price_for_service' => 'required' ,
        'law_firm_number' => 'required' ,
        'practice_number' => 'required' ,
        'blocked' => 'required' ,
        'phone_number_verification_status' => 'required' ,
        ]);

        $data = user::find($request->id);
        $data->name = $request->name;
        $data->profile_pic = $request->profile_pic;
        $data->company_name = $request->company_name;
        $data->company_url = $request->company_url;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->other_mobile_number = $request->other_mobile_number;
        $data->landline_number = $request->landline_number;
        $data->company_profile = $request->company_profile;
        $data->pan_number = $request->pan_number;
        $data->aadhar_number = $request->aadhar_number;
        $data->provided_service = $request->provided_service;
        $data->place_of_practice = $request->place_of_practice;
        $data->price_for_service = $request->price_for_service;
        $data->law_firm_number = $request->law_firm_number;
        $data->practice_number = $request->practice_number;
        $data->blocked = $request->blocked;
        $data->phone_number_verification_status = $request->phone_number_verification_status;

        $data->save();

        $updated_data = user::find($request->id);

        return response()->json([
            'data' => $data,
            'update_data' => $updated_data

        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(admin $admin)
    {
        //
    }

    public function user_index_admin(){

        $usertype = Auth::user()->usertype;

        if($usertype < 6){
            return response()->json([
                'unauthorised',
            ], 401);
        }

        return response()-> json([
            'data' => user::get(),
        ],200);
    }

    public function product_index_admin(){

        $usertype = Auth::user()->usertype;

        if($usertype < 6){
            return response()->json([
                'unauthorised',
            ], 401);
        }

        return response()-> json([
            'data' => product::get()
        ],200);
    }

    public function product_views(){

        $usertype = Auth::user()->usertype;

        if($usertype < 6){
            return response()->json([
                'unauthorised',
            ], 401);
        }

        return response()-> json([
        'data' => product::select('view_counter')->get()->sum('view_counter')
        ],200);
    }

    public function review_count(){

        $usertype = Auth::user()->usertype;

        if($usertype < 6){
            return response()->json([
                'unauthorised',
            ], 401);
        }

        return response()-> json([
        'data' => reviews::select('*')->get()
        ],200);
    }

    public function update_product(Request $request)
    {

        $request -> validate([
            'id' => 'required',
            'view_counter' => 'required',
            'address' => 'required',
            'city' => 'required',
            'rent_cond' => 'required',
            'rent_availability' => 'required',
            'sale_availability' => 'required',
            'possession_by' => 'required',
            'locality' => 'required',
            'display_address' => 'required',
            'ownership' => 'required',
            'expected_pricing' => 'required',
            'inclusive_pricing_details' => 'required',
            'tax_govt_charge' => 'required',
            'price_negotiable' => 'required',
            'maintenance_charge_status' => 'required',
            'maintenance_charge' => 'required',
            'maintenance_charge_condition' => 'required',
            'deposit' => 'required',
            'available_for' => 'required',
            'brokerage_charges' => 'required',
            'type' => 'required',
            'product_image1' => 'required',
            'product_image2' => 'required',
            'product_image3' => 'required',
            'product_image4' => 'required',
            'product_image5' => 'required',
            'bedroom' => 'required',
            'bathroom' => 'required',
            'balconies' => 'required',
            'additional_rooms' => 'required',
            'furnishing_status' => 'required',
            'furnishings' => 'required',
            'total_floors' => 'required',
            'property_on_floor' => 'required',
            'rera_registration_status' => 'required',
            'amenities' => 'required',
            'facing_towards' => 'required',
            'additional_parking_status' => 'required',
            'description' => 'required',
            'parking_covered_count' => 'required',
            'parking_open_count' => 'required',
            'availability_condition' => 'required',
            'buildyear' => 'required',
            'age_of_property' => 'required',
            'expected_rent' => 'required',
            'inc_electricity_and_water_bill' => 'required',
            'security_deposit' => 'required',
            'duration_of_rent_aggreement' => 'required',
            'month_of_notice' => 'required',
            'equipment' => 'required',
            'features' => 'required',
            'nearby_places' => 'required',
            'area' => 'required',
            'area_unit' => 'required',
            'carpet_area' => 'required',
            'property_detail' => 'required',
            'build_name' => 'required',
            'willing_to_rent_out_to' => 'required',
            'agreement_type' => 'required',
            'nearest_landmark' => 'required',
            'map_latitude' => 'required',
            'map_longitude' => 'required',
            'delete_flag' => 'required',
        ]);

        $data = product::find($request->id);

        $usertype = Auth::user()->usertype;

        if($usertype <6 ){
            return response()->json([
                'unauthorised',
            ], 401);
        }


        $data->view_counter = $request->view_counter;
        $data->address = $request->address;
        $data->city = $request->city;
        $data->rent_cond = $request->rent_cond;
        $data->rent_availability = $request->rent_availability;
        $data->sale_availability = $request->sale_availability;
        $data->possession_by = $request->possession_by;
        $data->locality = $request->locality;
        $data->display_address = $request->display_address;
        $data->ownership = $request->ownership;
        $data->expected_pricing = $request->expected_pricing;
        $data->inclusive_pricing_details = $request->inclusive_pricing_details;
        $data->tax_govt_charge = $request->tax_govt_charge;
        $data->price_negotiable = $request->price_negotiable;
        $data->maintenance_charge_status = $request->maintenance_charge_status;
        $data->maintenance_charge = $request->maintenance_charge;
        $data->maintenance_charge_condition = $request->maintenance_charge_condition;
        $data->deposit = $request->deposit;
        $data->available_for = $request->available_for;
        $data->brokerage_charges = $request->brokerage_charges;
        $data->type = $request->type;
        $data->product_image1 = $request->product_image1;
        $data->product_image2 = $request->product_image2;
        $data->product_image3 = $request->product_image3;
        $data->product_image4 = $request->product_image4;
        $data->product_image5 = $request->product_image5;
        $data->bedroom = $request->bedroom;
        $data->bathroom = $request->bathroom;
        $data->balconies = $request->balconies;
        $data->additional_rooms = $request->additional_rooms;
        $data->furnishing_status = $request->furnishing_status;
        $data->furnishings = $request->furnishings;
        $data->total_floors = $request->total_floors;
        $data->property_on_floor = $request->property_on_floor;
        $data->rera_registration_status = $request->rera_registration_status;
        $data->amenities = $request->amenities;
        $data->facing_towards = $request->facing_towards;
        $data->additional_parking_status = $request->additional_parking_status;
        $data->description = $request->description;
        $data->parking_covered_count = $request->parking_covered_count;
        $data->parking_open_count = $request->parking_open_count;
        $data->availability_condition = $request->availability_condition;
        $data->buildyear = $request->buildyear;
        $data->age_of_property = $request->age_of_property;
        $data->expected_rent = $request->expected_rent;
        $data->inc_electricity_and_water_bill = $request->inc_electricity_and_water_bill;
        $data->security_deposit = $request->security_deposit;
        $data->duration_of_rent_aggreement = $request->duration_of_rent_aggreement;
        $data->month_of_notice = $request->month_of_notice;
        $data->equipment = $request->equipment;
        $data->features = $request->features;
        $data->nearby_places = $request->nearby_places;
        $data->area = $request->area;
        $data->area_unit = $request->area_unit;
        $data->carpet_area = $request->carpet_area;
        $data->property_detail = $request->property_detail;
        $data->build_name = $request->build_name;
        $data->willing_to_rent_out_to = $request->willing_to_rent_out_to;
        $data->agreement_type = $request->agreement_type;
        $data->nearest_landmark = $request->nearest_landmark;
        $data->map_latitude = $request->map_latitude;
        $data->map_longitude = $request->map_longitude;
        $data->delete_flag = $request->delete_flag;

        $data->save();

        return response() -> json([
            'data' => $data
        ]);

    }


}
