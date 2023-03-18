<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Pesan;
use App\Models\Tiket;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

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
            return redirect('/admin');
        } elseif (Auth::user()->role == 1) {
            return view('SSD.sdd');
        }
        Auth::logout();
        return redirect('/login');
    }
}
