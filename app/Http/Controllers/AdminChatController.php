<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;

class AdminChatController extends Controller
{

    public function index()
    {
        return view('admin.dashboard');
    }
    public function admin_chat_head()
    {
        return view('admin.admin_chat_head');
    }

    public function admin_chat_main($status)
    {
        $tikets = Tiket::where('status', $status)->with('pesan')->get();
        return view('admin.admin_chat_main', ['tikets' => $tikets]);
    }

    public function antrian()
    {
        $tikets = Tiket::where('status', '=', 0)->get();
        $count = count($tikets);
        return view('admin.subcontent.antrian', ['count' => $count]);
    }

    public function pesan($id_tiket)
    {
        $id_pengguna = Auth::id();
        $tikets = Tiket::where([
            'id_tiket' => $id_tiket,
            'id_pengguna_admin' => $id_pengguna
        ])->with('pesanPerTiket')->get()->reverse();
        // dd($id_pengguna);
        return view(
            'admin.subcontent.chat_user',
            ['tikets' => $tikets]
        );
    }

    public function detail($id_tiket)
    {
        $tiket = Tiket::where('id_tiket', $id_tiket)->first();
        return view('admin.subcontent.detail', ['tiket' => $tiket]);
    }
}
