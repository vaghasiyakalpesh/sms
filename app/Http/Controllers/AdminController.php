<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|min:6|max:20",
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, "password" => $request->password])) {
            if (Auth::guard('admin')->user()->role !== 'admin') {
                Auth::guard('admin')->logout();
                return back()->with('error', 'you are not authorized`');
            }
            return redirect()->route('admin.dashboard')->with('success', 'Login successful');
        } else {
            return back()->with('error', 'Invalid credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', 'User Logout successfully');
    }

    public function register()
    {
        $user = new User();
        $user->name = "kalpo";
        $user->email = "kalpo@gmail.com";
        $user->password = Hash::make("admin123");
        $user->role = "student";
        $user->save();
        return redirect()->route('admin.login')->with('success', 'User registered successfully');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function form()
    {
        return view('admin.form');
    }

    public function table()
    {
        return view('admin.table');
    }


}
