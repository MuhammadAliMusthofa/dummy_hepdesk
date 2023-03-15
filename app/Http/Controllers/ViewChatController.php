<?php

namespace App\Http\Controllers;

use App\Tiket;
use Illuminate\Http\Request;

class ViewChatController extends Controller
{

    public function user(Request $request, Tiket $tiket)
    {
        return view('users.dashboard');
    }

    public function riwayat()
    {
        return view('users.riwayat_keluhan');
    }

    public function riwayat_detail()
    {
        return view('users.riwayat_detail');
    }

    public function admin(Request $request, Tiket $tiket)
    {
        return view('admin.subcontent.chat_antrian');
    }

    public function admin_chat(Request $request, Tiket $tiket)
    {
        $id_tiket = $request->route('id_tiket');
        // dd($id_tiket);
        return view('admin.subcontent.chat_user')->with('id_tiket', $id_tiket);
    }

    public function admin_detail(Request $request, Tiket $tiket)
    {
        $id_tiket = $request->route('id_tiket');
        // dd($tiket->first());
        return view('admin.subcontent.detail')->with('id_tiket', $id_tiket);
    }
}
