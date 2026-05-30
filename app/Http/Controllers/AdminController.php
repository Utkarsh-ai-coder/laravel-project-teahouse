<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){

        $users = Register::all();

        return view('admin.pages.index',['users'=>$users]);
    }

    public function create(){


        return view('admin.pages.create');
    }

    public function edit($id){

        //$user = Register::find($id);
        $user = Register::where('id',$id)->first();
        return view('admin.pages.edit', ['user'=> $user]);
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[

            'name' => 'required',
            'email' => 'required|unique:registers,email,'.$id,
            'image' => 'image|mimes:jpg,png,gif,jpeg,svg',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password|min:6',
            'phno' => 'required|numeric|digits:10',
            'course' => 'required',
            'gender' => 'required',

        ]);

        if($validator->fails()){

            return back()->withErrors($validator);
        }

        if(!empty($request->file('image'))){

            $fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('public/uploads/', $fileName );
        }else{

            $fileName = $request->old_img;
        }


        Register::where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $fileName,
            'password' => $request->password,
            'phno' => $request->phno,
            'course' => $request->course,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin-dashboard');

    }

    public function store(Request $request){



        //return $request->all(); (this will print all the data of form in json format)

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

            return back()->withErrors($validator);
        }

        $fileName = time().'.'.$request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('public/uploads/', $fileName );

        Register::create([

            'name' => $request->name,
            'email' => $request->email,
            'image' => $fileName,
            'password' => Hash::make($request->password),
            //'confirm_password' => $request->name,
            'phno' => $request->phno,
            'course' => $request->course,
            'gender' => $request->gender,
        ]);

        return redirect()->route('admin-dashboard');
    }

    public function delete($id){

        $user = Register::where('id',$id)->first();
        if(!is_null($user)){
            $user->delete();
        }

        return redirect()->route('admin-dashboard');
    }

}
