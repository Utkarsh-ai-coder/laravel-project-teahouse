<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(),[

            'name' => 'required',
            'email' => 'required|unique:registers,email',
            'image' => 'required|image|mimes:jpg,png,gif,jpeg,svg',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6',
            'phno' => 'required|numeric|digits:10',
            'course' => 'required',
            'gender' => 'required',

        ]);

        if($validator->fails()){

            return response()->json([

                'status' => false,
                'message' => 'validation error',
                'data' => $validator->messages()
            ], 403);
        }

        $fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/uploads/', $fileName );

        $user = Register::create([

            'name' => $request->name,
            'email' => $request->email,
            'image' => $fileName,
            'password' => Hash::make($request->password),
            //'confirm_password' => $request->name,
            'phno' => $request->phno,
            'course' => $request->course,
            'gender' => $request->gender,
        ]);

        if($user){

            return response()->json([

                'status' => true,
                'message' => 'user registration suceeded',
                'data' => $user
            ], 200);
        }else{

            return response()->json([

                'status' => false,
                'message' => 'something went wrong',
                'data' => $user
            ], 403);
        }

    }
}
