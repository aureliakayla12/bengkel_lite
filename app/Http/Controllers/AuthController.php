<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Pelanggan;
use App\Motor;
use App\Mekanik;
use App\Sparepart;
use App\Servis;

class AuthController extends Controller
{
    public function showformlogin()
    {
        return view('auth.login');
    }

    public function proseslogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
                return redirect()->intended('/dashboard')->with('success', 'You have Successfully logged in');
        }

        return back()->withErrors('Opps! You have entered invalid credentials');
    }


    public function dashboard()
    {
        $totalPelanggan = Pelanggan::count();
        $totalMotor = Motor::count();
        $totalMekanik = Mekanik::count();
        $totalSparepart = Sparepart::count();
        $totalServis = Servis::count();

        return view('auth.dashboard', compact(
            'totalPelanggan',
            'totalMotor',
            'totalMekanik',
            'totalSparepart',
            'totalServis'
        ));
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
}
