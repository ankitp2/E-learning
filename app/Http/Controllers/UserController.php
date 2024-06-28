<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'phone_no' => 'required',
            'password' => 'required'
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone_no = $request->phone_no;
        $data->password = $request->password;
        $data->save();
        return redirect()->route('signup')->with('success', "User registered successfully.Please Login.");
    }
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            if ($request->email == 'admin@chetu.com' && $request->password == 'admin@123') {

                return redirect()->route('admin.adminindex');
            } else {
                return view('index');
            }
        } else {
            return redirect('signup')->with('success', 'Invalid Credentials.');
        }
    }
    public function logout()
    {
        Auth::logout();
        Session::flush();
        return redirect()->route('index')->with("success", "You are logged out Successfully.");
    }
    public function admin_index()
    {
        $parameter = Route::current();
                $data = $parameter->uri;
                
        return view('admin.adminindex',compact('data'));
    }
}
