<?php

namespace App\Http\Controllers\Api;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Image;
use App\Models\User;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product::latest()->paginate(100);
        //$tableq = DB::table('users')->select('id','name','email','profile_pic')->get();
        return response()->json([
            //'users'=> $tableq,
            'data' =>$data,
        ], 201);
//         $mer=[];

//         //$tableqt = DB::table('users')->select('*')->get();
//         $max_id = DB::table('products')->where('id', DB::raw("(select max(`id`) from products)"))->value("id");

//         for ($id_var = 0; $id_var<=$max_id; $id_var++){

//         for ($variable = $id_var; $variable == $id_var; $variable++)
//         {
//             $product_id_func = product::where('id','=', $variable)->get()->toArray();
//             $userid = DB::table('products')->select('user_id')->where("id", $variable)->value("value");
//             $tableq = DB::table('users')->select('name','email','profile_pic')->where('id', $userid)->get()->toArray();

//             $merged1 = array_merge($product_id_func, $tableq);

//         }
//         //$object = json_decode(json_encode($merged1), FALSE);

//         //$mer = array_merge($mer, $merged1);

// $mer = array_merge($mer, $merged1);
//         //$mer = $merged2->merge($object);

//         }
//         return response()-> json([
//             //'user_data' => $tableq,
//             'data' => $mer,
//             //'product' => $product_id_func,
//         ]);


    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_sale(Request $request)
    {
        $request -> validate([
            'user_id' => 'required' ,
            'build_name' => 'required' ,
            'type' => 'required' ,
            'address' => 'required' ,
            'city' => 'required' ,
            'locality' => 'required' ,
            'property_detail' => 'required' ,
            'nearest_landmark' => 'required' ,
            'map_latitude' => 'required' ,
            'map_longitude' => 'required' ,
            'display_address' => 'required' ,
            'product_image1' => 'required' ,
            'product_image2' => 'required' ,
            'product_image3' => 'required' ,
            'product_image4' => 'required' ,
            'product_image5' => 'required' ,
            'area' => 'required' ,
            'area_unit' => 'required' ,
            'carpet_area' => 'required' ,
            'bedroom' => 'required' ,
            'bathroom' => 'required' ,
            'balconies' => 'required' ,
            'additional_rooms' => 'required' ,
            'furnishing_status' => 'required' ,
            'furnishings' => 'required' ,
            'total_floors' => 'required' ,
            'property_on_floor' => 'required' ,
            'rera_registration_status' => 'required' ,
            'additional_parking_status' => 'required' ,
            'parking_covered_count' => 'required' ,
            'parking_open_count' => 'required' ,
            'sale_availability' => 'required' ,
            'possession_by' => 'required' ,
            'maintenance_charge' => 'required' ,
            'maintenance_charge_status' => 'required' ,
            'maintenance_charge_condition' => 'required' ,
            'ownership' => 'required' ,
            'expected_pricing' => 'required' ,
            'inclusive_pricing_details' => 'required' ,
            'tax_govt_charge' => 'required' ,
            'price_negotiable' => 'required' ,
            'deposit' => 'required' ,
            'brokerage_charges' => 'required' ,
            'facing_towards' => 'required' ,
            'availability_condition' => 'required' ,
            'amenities' => 'required' ,
            'buildyear' => 'required' ,
            'age_of_property' => 'required' ,
            'description' => 'required' ,
            'equipment' => 'required' ,
            'features' => 'required' ,
            'nearby_places' => 'required' ,
        ]);





        // $file_data = $request->input('product_image');
        // $file_name = 'image_' . time() . '.jpeg'; //generating unique file name;

        // // // storing image in storage/app/public Folder
        // //     $path = Storage::disk('ftp')->put('/product_image_file'.$file_name, base64_decode($file_data));


        //     $path = Storage::disk('ftp')->put('product_image_file/'.$file_name, base64_decode($file_data));
        //     //Image::make($request->file('product_image'));


        $base64_image1 = $request->input('product_image1'); // your base64 encoded
        @list($type, $file_data1) = explode(';', $base64_image1);
        @list(, $file_data1) = explode(',', $file_data1);
        $imageName1 = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName1, base64_decode($file_data1));


        $base64_image2 = $request->input('product_image2'); // your base64 encoded
        @list($type, $file_data2) = explode(';', $base64_image2);
        @list(, $file_data2) = explode(',', $file_data2);
        $imageName2 = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName2, base64_decode($file_data2));


        $base64_image3 = $request->input('product_image3'); // your base64 encoded
        @list($type, $file_data3) = explode(';', $base64_image3);
        @list(, $file_data3) = explode(',', $file_data3);
        $imageName3 = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName3, base64_decode($file_data3));


        $base64_image4 = $request->input('product_image4'); // your base64 encoded
        @list($type, $file_data4) = explode(';', $base64_image4);
        @list(, $file_data4) = explode(',', $file_data4);
        $imageName4 = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName4, base64_decode($file_data4));


        $base64_image5 = $request->input('product_image5'); // your base64 encoded
        @list($type, $file_data5) = explode(';', $base64_image5);
        @list(, $file_data5) = explode(',', $file_data5);
        $imageName5 = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName5, base64_decode($file_data5));



        // 'product_image' => 'product_image_file/'.$imageName,


            //$image = Image::make($image_file);

           // Response::make($image->encode('jpeg'));

            $product_data = new Product([
            'user_id' => $request->user_id,
            'build_name' => $request->build_name,
            'type' => $request->type,
            'address' => $request->address,
            'city' => $request->city,
            'locality' => $request->locality,
            'property_detail' => $request->property_detail,
            'nearest_landmark' => $request->nearest_landmark,
            'map_latitude' => $request->map_latitude,
            'map_longitude' => $request->map_longitude,
            'display_address' => $request->display_address,
            'product_image1' => 'product_image_file/'.$imageName1,
            'product_image2' => 'product_image_file/'.$imageName2,
            'product_image3' => 'product_image_file/'.$imageName3,
            'product_image4' => 'product_image_file/'.$imageName4,
            'product_image5' => 'product_image_file/'.$imageName5,
            'area' => $request->area,
            'area_unit' => $request->area_unit,
            'carpet_area' => $request->carpet_area,
            'bedroom' => $request->bedroom,
            'bathroom' => $request->bathroom,
            'balconies' => $request->balconies,
            'additional_rooms' => $request->additional_rooms,
            'furnishing_status' => $request->furnishing_status,
            'furnishings' => $request->furnishings,
            'total_floors' => $request->total_floors,
            'property_on_floor' => $request->property_on_floor,
            'rera_registration_status' => $request->rera_registration_status,
            'additional_parking_status' => $request->additional_parking_status,
            'parking_covered_count' => $request->parking_covered_count,
            'parking_open_count' => $request->parking_open_count,
            'sale_availability' => $request->sale_availability,
            'possession_by' => $request->possession_by,
            'ownership' => $request->ownership,
            'expected_pricing' => $request->expected_pricing,
            'inclusive_pricing_details' => $request->inclusive_pricing_details,
            'tax_govt_charge' => $request->tax_govt_charge,
            'price_negotiable' => $request->price_negotiable,
            'maintenance_charge_status' => $request->maintenance_charge_status,
            'maintenance_charge' => $request->maintenance_charge,
            'maintenance_charge_condition' => $request->maintenance_charge_condition,
            'deposit' => $request->deposit,
            'brokerage_charges' => $request->brokerage_charges,
            'facing_towards' => $request->facing_towards,
            'availability_condition' => $request->availability_condition,
            'amenities' => $request->amenities,
            'buildyear' => $request->buildyear,
            'age_of_property' => $request->age_of_property,
            'description' => $request->description,
            'equipment' => $request->equipment,
            'features' => $request->features,
            'nearby_places' => $request->nearby_places,
            ]);

            //product::create($product_data);
            $product_data->save();

            return response()->json([
                'message' => 'Successfully inserted product for sale',
                'path' => $product_data,
            ], 201);

    }


    public function create_rent(Request $request)
    {
        $request -> validate([
            'user_id' => 'required' ,
            'build_name' => 'required' ,
            'type' => 'required' ,
            'willing_to_rent_out_to' => 'required' ,
            'agreement_type' => 'required' ,
            'address' => 'required' ,
            'display_address' => 'required' ,
            'city' => 'required' ,
            'locality' => 'required' ,
            'property_detail' => 'required' ,
            'nearest_landmark' => 'required' ,
            'map_latitude' => 'required' ,
            'map_longitude' => 'required' ,
            'product_image1' => 'required' ,
            'product_image2' => 'required' ,
            'product_image3' => 'required' ,
            'product_image4' => 'required' ,
            'product_image5' => 'required' ,
            'nearby_places' => 'required' ,
            'area' => 'required' ,
            'area_unit' => 'required' ,
            'carpet_area' => 'required' ,
            'bedroom' => 'required' ,
            'bathroom' => 'required' ,
            'balconies' => 'required' ,
            'additional_rooms' => 'required' ,
            'furnishing_status' => 'required' ,
            'furnishings' => 'required' ,
            'total_floors' => 'required' ,
            'property_on_floor' => 'required' ,
            'rera_registration_status' => 'required' ,
            'additional_parking_status' => 'required' ,
            'parking_covered_count' => 'required' ,
            'parking_open_count' => 'required' ,
            'rent_availability' => 'required' ,
            'available_for' => 'required' ,
            'buildyear' => 'required' ,
            'age_of_property' => 'required' ,
            'possession_by' => 'required' ,
            'duration_of_rent_aggreement' => 'required' ,
            'security_deposit' => 'required' ,
            'maintenance_charge' => 'required',
            'maintenance_charge_status' => 'required' ,
            'maintenance_charge_condition' => 'required' ,
            'ownership' => 'required' ,
            'rent_cond' => 'required' ,
            'expected_pricing' => 'required' ,
            'inclusive_pricing_details' => 'required' ,
            'tax_govt_charge' => 'required' ,
            'price_negotiable' => 'required' ,
            'deposit' => 'required' ,
            'brokerage_charges' => 'required' ,
            'amenities' => 'required' ,
            'facing_towards' => 'required' ,
            'availability_condition' => 'required' ,
            'expected_rent' => 'required' ,
            'inc_electricity_and_water_bill' => 'required' ,
            'month_of_notice' => 'required' ,
            'equipment' => 'required' ,
            'features' => 'required' ,
            'description' => 'required' ,
        ]);




        $base64_image1 = $request->input('product_image1'); // your base64 encoded
        @list($type, $file_data1) = explode(';', $base64_image1);
        @list(, $file_data1) = explode(',', $file_data1);
        $imageName1 = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName1, base64_decode($file_data1));


        $base64_image2 = $request->input('product_image2'); // your base64 encoded
        @list($type, $file_data2) = explode(';', $base64_image2);
        @list(, $file_data2) = explode(',', $file_data2);
        $imageName2 = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName2, base64_decode($file_data2));


        $base64_image3 = $request->input('product_image3'); // your base64 encoded
        @list($type, $file_data3) = explode(';', $base64_image3);
        @list(, $file_data3) = explode(',', $file_data3);
        $imageName3 = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName3, base64_decode($file_data3));


        $base64_image4 = $request->input('product_image4'); // your base64 encoded
        @list($type, $file_data4) = explode(';', $base64_image4);
        @list(, $file_data4) = explode(',', $file_data4);
        $imageName4 = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName4, base64_decode($file_data4));


        $base64_image5 = $request->input('product_image5'); // your base64 encoded
        @list($type, $file_data5) = explode(';', $base64_image5);
        @list(, $file_data5) = explode(',', $file_data5);
        $imageName5 = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName5, base64_decode($file_data5));


            $product_data = new Product([
            'user_id' => $request->user_id ,
            'build_name' => $request->build_name ,
            'type' => $request->type ,
            'willing_to_rent_out_to' => $request->willing_to_rent_out_to ,
            'agreement_type' => $request->agreement_type ,
            'address' => $request->address ,
            'display_address' => $request->display_address ,
            'city' => $request->city ,
            'locality' => $request->locality ,
            'property_detail' => $request->property_detail ,
            'nearest_landmark' => $request->nearest_landmark ,
            'map_latitude' => $request->map_latitude ,
            'map_longitude' => $request->map_longitude ,
            'product_image1' => 'product_image_file/'.$imageName1,
            'product_image2' => 'product_image_file/'.$imageName2,
            'product_image3' => 'product_image_file/'.$imageName3,
            'product_image4' => 'product_image_file/'.$imageName4,
            'product_image5' => 'product_image_file/'.$imageName5,
            'nearby_places' => $request->nearby_places ,
            'area' => $request->area ,
            'area_unit' => $request->area_unit ,
            'carpet_area' => $request->carpet_area ,
            'bedroom' => $request->bedroom ,
            'bathroom' => $request->bathroom ,
            'balconies' => $request->balconies ,
            'additional_rooms' => $request->additional_rooms ,
            'furnishing_status' => $request->furnishing_status ,
            'furnishings' => $request->furnishings ,
            'total_floors' => $request->total_floors ,
            'property_on_floor' => $request->property_on_floor ,
            'rera_registration_status' => $request->rera_registration_status ,
            'additional_parking_status' => $request->additional_parking_status ,
            'parking_covered_count' => $request->parking_covered_count ,
            'parking_open_count' => $request->parking_open_count ,
            'rent_availability' => $request->rent_availability ,
            'available_for' => $request->available_for ,
            'buildyear' => $request->buildyear ,
            'age_of_property' => $request->age_of_property ,
            'possession_by' => $request->possession_by ,
            'duration_of_rent_aggreement' => $request->duration_of_rent_aggreement ,
            'security_deposit' => $request->security_deposit ,
            'maintenance_charge' =>$request->maintenance_charge ,
            'maintenance_charge_status' => $request->maintenance_charge_status ,
            'maintenance_charge_condition' => $request->maintenance_charge_condition ,
            'ownership' => $request->ownership ,
            'rent_cond' => $request->rent_cond ,
            'expected_pricing' => $request->expected_pricing ,
            'inclusive_pricing_details' => $request->inclusive_pricing_details ,
            'tax_govt_charge' => $request->tax_govt_charge ,
            'price_negotiable' => $request->price_negotiable ,
            'deposit' => $request->deposit ,
            'brokerage_charges' => $request->brokerage_charges ,
            'amenities' => $request->amenities ,
            'facing_towards' => $request->facing_towards ,
            'availability_condition' => $request->availability_condition ,
            'expected_rent' => $request->expected_rent ,
            'inc_electricity_and_water_bill' => $request->inc_electricity_and_water_bill ,
            'month_of_notice' => $request->month_of_notice ,
            'equipment' => $request->equipment ,
            'features' => $request->features ,
            'description' => $request->description ,
            ]);

            //product::create($product_data);
            $product_data->save();

            return response()->json([
                'message' => 'Successfully inserted product for rent',
                'path' => $product_data,
            ], 201);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     public function search_prod_by_id(Request $request){


        $request->validate([
            'prod_id' => 'required',
        ]);
            $prod_id = $request->prod_id;

        $product_id_func = product::find($prod_id)->productid;
        $userid = DB::table('products')->select('user_id')->where("id", $prod_id)->value("value");
        $tableq = DB::table('users')->select('id','name','email','profile_pic')->where('id', $userid)->get();

            return response()-> json([
                'user_data' => $tableq,
                //'user_id' => $userid,
                'product' => $product_id_func,
            ]);

        // return response()-> json([
        //     'result' => $var3,
        // ]);
     }

     public function search_func(Request $request){

        $request->validate([
            'building' => '',
            'type' => '',
            'city' => ''
        ]);
        $prod_query1 = $request->building;
        $prod_query2 = $request->type;
        $prod_query3 = $request->city;


        // $needles = explode(',', $q);

        // In my case, I wanted to split the string when a comma or a whitespace is found:
        // $needles = preg_split('/[\s,]+/', $q);

        // $products = product::where('build_name', 'LIKE', "%{$q}%");

        $products = product::Where('build_name', 'like', '%' . $prod_query1 . '%')
            ->orWhere('type', 'like', '%' . $prod_query2 . '%')
               ->orWhere('city', 'like', '%' . $prod_query3 . '%');


        // foreach ($needles as $needle) {
        //     $products = $products->orWhere('build_name', 'LIKE', "%{$needle}%");
        // }

        $products = $products->paginate(150);

        return response()-> json([
            'product' => $products,
        ]);
     }


      public function product_index(){

        // $merged2 =  DB::table('users')->select()->where('id');
        // $merged1 = [];
        $mer=[];

        //$tableqt = DB::table('users')->select('*')->get();
        $max_id = DB::table('products')->where('id', DB::raw("(select max(`id`) from products)"))->value("id");

        for ($id_var = 0; $id_var<=$max_id; $id_var++){

        for ($variable = $id_var; $variable == $id_var; $variable++)
        {
            $product_id_func = product::where('id','=', $variable)->get()->toArray();
            $userid = DB::table('products')->select('user_id')->where("id", $variable)->value("value");
            $tableq = DB::table('users')->select('name','email','profile_pic')->where('id', $userid)->get()->toArray();

            $merged1 = array_merge($product_id_func, $tableq);

        }
        //$object = json_decode(json_encode($merged1), FALSE);

        //$mer = array_merge($mer, $merged1);

$mer = array_merge($mer, $merged1);
        //$mer = $merged2->merge($object);

        }
        return response()-> json([
            //'user_data' => $tableq,
            'data' => $mer,
            //'product' => $product_id_func,
        ]);
        // return response()->json([
        //     'data' => $max_id,
        // ], 201);


        // return response()-> json([
        //     'result' => $prod_index,
        // ]);
    }




    public function store(Request $request)
    {

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
