<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signin(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (Auth::attempt($credentials) && Auth::user()->status) {
            // Authentication passed
            $request->session()->regenerate();
            if (Auth::user()->type == 'admin') {
                return redirect()->route('dashboard')->with('success', "تم تسجيل الدخول بنجاح");
            } else {
                return redirect()->route('home')->with('success', "تم تسجيل الدخول بنجاح");
            }
        }
        // Authentication failed
        return back()->withErrors([
            'email' => 'البيانات المدخلة غير متطابقة.',
        ]);
    }


    public function signup(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => 1,

        ]);

        Auth::login($user);
        return redirect()->route('home')->with('success', 'تم تسجيل الدخول بنجاح !');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login')->with('success', 'تم تسجيل الخروج بنجاح!');
    }
}
