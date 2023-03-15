<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (
            Auth::user()->role == 0
        ) {
            return view('admin.subcontent.antrian');
        } elseif (Auth::user()->role == 1) {
            return view('user.sdid');
        }
        Auth::logout();
        return redirect('/login');
    }

    public function riwayat_detail()
    {
        return view('users.riwayat_detail');
    }

    public function user_chat()
    {
        return view('users.dashboard');
    }

  
    public function riwayat_keluhan()
    {
        return view('users.riwayat_keluhan');
    }
}
