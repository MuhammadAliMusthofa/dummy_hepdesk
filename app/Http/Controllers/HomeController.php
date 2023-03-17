<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Tiket;
use App\User;
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
            $tikets = Tiket::with('pesan')->get();
            // dd($tikets);
            return view('trying.subcontent.antrian', ['tikets' => $tikets]);
        } elseif (Auth::user()->role == 1) {
            return view('SSD.sdd');
        }
        Auth::logout();
        return redirect('/login');
    }

    public function pesan(Request $request)
    {
        $users = Auth::user();
        // dd($users->id);
        $tikets = Tiket::with('pesan')->get();
        $pesans = Tiket::where('id_tiket', $request->route('id_tiket'))->with('pesanPerTiket')->get();
        // dd($pesans);
        return view(
            'trying.admin_chat',
            [
                'tikets' => $tikets,
                'pesans' => $pesans,
                'users' => $users
            ]
        );
    }
}
