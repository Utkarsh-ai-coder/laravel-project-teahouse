<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function index()
    {
        return view('website.pages.login');
    }

    public function login(Request $request)
    {
        // validate data
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // login code

        if (Auth::attempt($request->only('email', 'password'))) {

            $usertype = Auth::user()->role;
            if ($usertype == 1) {
                return redirect()->route('admin-dashboard');
            } else {
                return redirect()->route('home');
            }
        }


        return redirect('login')->withError('Login details are not valid');
    }


    public function register(Request $request)
    {
        // validate
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed'
        ]);

        // save in users table

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        return redirect()->route('home');
    }


    public function register_view()
    {
        return view('website.pages.register');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('home');
    }

    public function error_page(){

        return view('website.pages.404');
    }


}
