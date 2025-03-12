<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Mail\RegistrationConfirmationMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function memberRegistration(Request $request){

        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'password_confirmation' => 'required',
            'profile_image' => 'nullable|mime:png,jpg|max-size:2048',
        ]);

        if($validation->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'validation error',
                'errors'=> $validation->errors()
            ], 400);
        }

        $profile_image = null;
        if($request->hasFile('profile_image')){
            $image = $request->file('profile_image');
            $image_name = 'profile_image_'.time().$image->getClientOriginalExtension();
            $image->storeAs('profile_image', $image_name);
            $profile_image = 'storage/profile_image/'.$image_name;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'user',
            'password' => Hash::make($request->password),
            'profile_image' => $profile_image,
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        // send registeration confirm mail

        Mail::to($user->email)->send(new RegistrationConfirmationMail($user));
        
        return response()->json([
            'status'=> true,
            'message'=> 'Registration successfull',
            'data'=> new UserResource($user),
            'token'=> $token
        ], 200);
        
    }

    public function login(Request $request) {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'status'=> false,
                'message'=> 'validation error',
                'errors'=> $validation->errors()
            ], 400);
        }

        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'status'=> false,
                'message'=> 'Credentials do not match',
            ], 400);
        }

        $token = $user->createToken('auth_token')->plainTextToken;
        
        return response()->json([
            'status'=> true,
            'message'=> 'Login successfull',
            'data'=> new UserResource($user),
            'token'=> $token
        ], 200);

    }

    public function user(Request $request, $id) {
        $user = User::find($id);
        return response()->json([
            'status'=> true,
            'message'=> 'User fetched successfully',
            'data'=> new UserResource($user)
        ], 200);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status'=> true,
            'message'=> 'Logout successfull',
        ], 200);
    }
}
