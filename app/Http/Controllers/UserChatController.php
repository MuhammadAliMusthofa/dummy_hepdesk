<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserChatController extends Controller
{

    public function userChat(Request $request, Tiket $tiket)
    {
        return view('users.chat');
    }

    public function riwayat()
    {
        $id = Auth::user()->id;
        $tikets = Tiket::where('id_pengguna', $id)->get();
        return view('users.riwayat_keluhan')->with('tikets', $tikets);
    }

    public function riwayat_detail()
    {
        return view('users.riwayat_detail');
    }

    public function adminChat(Request $request, Tiket $tiket)
    {
        return view('admin.subcontent.antrian');
    }

    public function adminChatUser(Request $request, Tiket $tiket)
    {
        $id_tiket = $request->route('id_tiket');
        // dd($id_tiket);
        return view('admin.subcontent.chat_user')->with('id_tiket', $id_tiket);
    }

    public function adminChatDetail(Request $request, Tiket $tiket)
    {
        $id_tiket = $request->route('id_tiket');
        // dd($tiket->first());
        return view('admin.subcontent.detail')->with('id_tiket', $id_tiket);
    }
}
