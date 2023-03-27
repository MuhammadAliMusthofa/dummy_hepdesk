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
use DB;

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

        $user = User::all();
        if (
            Auth::user()->role == 0 
        ) {
            // role 0 adalah admin
            return view('admin.subcontent.antrian');

        } elseif (Auth::user()->role == 1) {
            // role 1 adalah user
            return view('user.sdid', compact('user'));
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
    ->orWhere('departemen', 'LIKE', "%$query%")
    ->orWhere('status', 'LIKE', "%$query%")
    ->get();
    return view('users.riwayat_search', compact('datas', 'query'));

    }

    // public function search(Request $request)
    // {
    //     $query = $request->get('query');
    //     $posts = Tiket::where('nama', 'LIKE', '%' . $query . '%')->get();

    //     return response()->json($posts);
    // }

    // public function loadData(Request $request)
    // {
    //     if ($request->has('q')) {
    //         $cari = $request->q;
    //         $data = Tiket::where('nama', 'LIKE', '%$cari%')->get();
    //         return response()->json($data);
    //     }
    // }

    // public function indexAjax(Request $request)
    // {
    //     try {
    //         $param['draw'] = $request->input('draw');
    //         $start = $request->input('start');
    //         $length = $request->input('length');
    //         $searchValue = $request->input('search.value');

    //         $model          = new Tiket();
    //         $data           = $model->searchAndDisplay($searchValue, $start, $length);
    //         $totalCount     = $model->searchAndDisplay($searchValue);

    //         $jsonData = [
    //             'draw'              => intval($param['draw']),
    //             'recordsTotal'      => count($totalCount),
    //             'recordsFiltered'   => count($totalCount),
    //             'data'              => $data
    //         ];

    //         return response()->json($jsonData);
    //     } catch (\Throwable $th) {
    //         return $this->fail($th->getMessage());
    //     }
    // }


   

}
