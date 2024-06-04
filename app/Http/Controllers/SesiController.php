<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function register()
    {
        return view('register');
    }



    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,

        ];

        if (Auth::attempt($infologin)) {
            if (Auth::user()->role == 'Merchant') {
                return redirect('/admin/merchants');
            } elseif (Auth::user()->role == 'Customer') {
                return redirect('/admin/customers');
            }
        } else {
            return redirect('')->withErrors('Username and password wrong')->withInput();
        }
    }

    function register2(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'Name wajib diisi',
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
            'role.required' => 'Role wajib diisi',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        
        $inforegister = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role,

        ];

        if (Auth::attempt($inforegister)) {
            return redirect('/');
        } else {
            return redirect('')->withErrors('Failed to Register Account')->withInput();
        }
    }


    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
