<?php

namespace App\Http\Controllers;
use App\User;
use App\Tiket;
// use Datatables;
// use App\Http\Controllers\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Yajra\Datatables\Datatables;
use DataTables;

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
            // role 0 adalah admin
            return view('admin.subcontent.antrian');

        } elseif (Auth::user()->role == 1) {
            // role 1 adalah user
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
        $tikets= Tiket::paginate(10);
        return view('users.riwayat_keluhan', compact('tikets'));
    }

  

    public function search(Request $request)
    {

    $query = $request->input('query');
    $datas = Tiket::where('id_tiket', 'LIKE', "%$query%")
    ->orWhere('tanggal', 'LIKE', "%$query%")
    ->orWhere('nama', 'LIKE', "%$query%")
    ->orWhere('email', 'LIKE', "%$query%")
    ->get();
    return view('users.riwayat_search', compact('datas', 'query'));

    }


}
