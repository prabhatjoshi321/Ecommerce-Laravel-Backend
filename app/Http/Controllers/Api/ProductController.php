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
            'user_id' => 'required',
            'product_image' => 'required',
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





        // $file_data = $request->input('product_image');
        // $file_name = 'image_' . time() . '.jpeg'; //generating unique file name;

        // // // storing image in storage/app/public Folder
        // //     $path = Storage::disk('ftp')->put('/product_image_file'.$file_name, base64_decode($file_data));


        //     $path = Storage::disk('ftp')->put('product_image_file/'.$file_name, base64_decode($file_data));
        //     //Image::make($request->file('product_image'));


        $base64_image = $request->input('product_image'); // your base64 encoded
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $imageName = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName, base64_decode($file_data));





            //$image = Image::make($image_file);

           // Response::make($image->encode('jpeg'));

            $product_data = new Product([
                'user_id' => $request->user_id,
                'product_image' => 'product_image_file/'.$imageName,
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
                'build_name' => $request->build_name,
            ]);

            //product::create($product_data);
            $product_data->save();

            return response()->json([
                'message' => 'Successfully inserted product',
                'path' => $product_data,
            ], 201);

    }


    public function create_rent(Request $request)
    {
        $request -> validate([
            'user_id' => 'required',
            'product_image' => 'required',
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





        // $file_data = $request->input('product_image');
        // $file_name = 'image_' . time() . '.jpeg'; //generating unique file name;

        // // // storing image in storage/app/public Folder
        // //     $path = Storage::disk('ftp')->put('/product_image_file'.$file_name, base64_decode($file_data));


        //     $path = Storage::disk('ftp')->put('product_image_file/'.$file_name, base64_decode($file_data));
        //     //Image::make($request->file('product_image'));


        $base64_image = $request->input('product_image'); // your base64 encoded
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $imageName = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('product_image_file/'.$imageName, base64_decode($file_data));





            //$image = Image::make($image_file);

           // Response::make($image->encode('jpeg'));

            $product_data = new Product([
                'user_id' => $request->user_id,
                'product_image' => 'product_image_file/'.$imageName,
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
                'build_name' => $request->build_name,
            ]);

            //product::create($product_data);
            $product_data->save();

            return response()->json([
                'message' => 'Successfully inserted product',
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

        $products = $products->paginate(15);

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
