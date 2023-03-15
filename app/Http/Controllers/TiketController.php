<?php

namespace App\Http\Controllers;

use App\Tiket;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Tiket $tiket)
    {
        $id_tiket = $request->route('id_tiket');
        // dd($id_tiket);
        return view('admin.subcontent.chat_antrian')->with('id_tiket', $id_tiket);
    }

    public function user(Request $request, Tiket $tiket)
    {
        $id_tiket = $request->route('id_tiket');
        // dd($id_tiket);
        return view('admin.subcontent.chat_user')->with('id_tiket', $id_tiket);
    }

    public function detail(Request $request, Tiket $tiket)
    {
        $id_tiket = $request->route('id_tiket');
        // dd($tiket->first());
        return view('admin.subcontent.detail')->with('id_tiket', $id_tiket);
    }
}
