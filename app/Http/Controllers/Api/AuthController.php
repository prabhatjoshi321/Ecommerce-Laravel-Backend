<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;
use Image;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function user_signup(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users',
            'other_mobile_number' => 'required|integer|between:1000000000,9999999999',
            'profile_pic' => 'required',
            'password' => 'required|string|confirmed'
        ]);

        $base64_image = $request->input('profile_pic'); // your base64 encoded
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $imageName = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('profile_image_file/'.$imageName, base64_decode($file_data));

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'profile_pic' => 'profile_image_file/'.$imageName,
            'usertype' => 1,
            'other_mobile_number' => $request->other_mobile_number,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'data' => $user,
            'message' => 'Successfully created user!'
        ], 201);
    }

    public function owner_signup(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users',
            'other_mobile_number' => 'required|integer|between:1000000000,9999999999',
            'address' => 'required',
            'city' => 'required',
            'pan_number' => 'required',
            'aadhar_number' => 'required',
            'profile_pic' => 'required',
            'password' => 'required|string|confirmed'
        ]);

        $base64_image = $request->input('profile_pic'); // your base64 encoded
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $imageName = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('profile_image_file/'.$imageName, base64_decode($file_data));

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'other_mobile_number' => $request->other_mobile_number,
            'address' => $request->address,
            'city' => $request->city,
            'pan_number' => $request->pan_number,
            'aadhar_number' => $request->aadhar_number,
            'profile_pic' => 'profile_image_file/'.$imageName,
            'usertype' => 2,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'data' => $user,
            'message' => 'Successfully created owner'
        ], 201);
    }

    public function dealer_company_signup(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users',
            'other_mobile_number' => 'required|integer|between:1000000000,9999999999',
            'address' => 'required',
            'city' => 'required',
            'pan_number' => 'required',
            'aadhar_number' => 'required',
            'company_name' => 'required',
            'company_url' => 'required',
            'landline_number' => 'required',
            'company_profile' => 'required',
            'profile_pic' => 'required',
            'password' => 'required|string|confirmed'
        ]);

        $base64_image = $request->input('profile_pic'); // your base64 encoded
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $imageName = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('profile_image_file/'.$imageName, base64_decode($file_data));

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'other_mobile_number' => $request->other_mobile_number,
            'address' => $request->address,
            'city' => $request->city,
            'pan_number' => $request->pan_number,
            'aadhar_number' => $request->aadhar_number,
            'landline_number' => $request->landline_number,
            'company_name' => $request->company_name,
            'company_url' => $request->company_url,
            'company_profile' => $request->company_profile,
            'profile_pic' => 'profile_image_file/'.$imageName,
            'usertype' => 3,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'data' => $user,
            'message' => 'Successfully created dealer/company'
        ], 201);
    }



    public function lawyer(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|unique:users',
            'other_mobile_number' => 'required|integer|between:1000000000,9999999999',
            'address' => 'required',
            'city' => 'required',
            'pan_number' => 'required',
            'aadhar_number' => 'required',
            'landline_number' => 'required',
            'practice_number' =>'required',
            'law_firm_number' =>'required',
            'provided_service' =>'required',
            'place_of_practice' =>'required',
            'price_for_service' =>'required',
            'profile_pic' => 'required',
            'password' => 'required|string|confirmed'
        ]);

        $base64_image = $request->input('profile_pic'); // your base64 encoded
        @list($type, $file_data) = explode(';', $base64_image);
        @list(, $file_data) = explode(',', $file_data);
        $imageName = 'IMAGE'.Str::random(30).'.'.'png';
        Storage::disk('ftp')->put('profile_image_file/'.$imageName, base64_decode($file_data));

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'pan_number' => $request->pan_number,
            'aadhar_number' => $request->aadhar_number,
            'provided_service' =>$request->provided_service,
            'place_of_practice' =>$request->place_of_practice,
            'price_for_service' =>$request->price_for_service,
            'law_firm_number' =>$request->law_firm_number,
            'practice_number' =>$request->practice_number,
            'other_mobile_number' => $request->other_mobile_number,
            'landline_number' => $request->landline_number,
            'profile_pic' => 'profile_image_file/'.$imageName,
            'usertype' => 4,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        return response()->json([
            'data' => $user,
            'message' => 'Successfully created lawyer'
        ], 201);
    }

    public function login(Request $request){

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(20);
        $token->save();
        return response()->json([
            'username' => $user->name,
            'usertype' => $user->usertype,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }

    public function user(Request $request){
        return response()->json($request->user());
    }
}
