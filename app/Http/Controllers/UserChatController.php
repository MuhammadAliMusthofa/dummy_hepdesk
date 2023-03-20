<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserChatController extends Controller
{
    public function index()
    {
        $id_pengguna = Auth::id();
        $tiket = Tiket::where([
            'id_pengguna_user' => $id_pengguna,
            'status' => 1
        ])->orWhere('status', 2)->first();

        return view('users.pesan', ['tiket' => $tiket]);
    }
    public function pesan($id_tiket)
    {
        $tiket = Tiket::where([
            'id_tiket' => $id_tiket
        ])->with('pesanPerTiket')->first();
        // dd($tikets);
        return view(
            'users.isi_pesan',
            ['tiket' => $tiket]
        );
    }

    public function riwayat()
    {
        # code...
    }

    public function detailRiwayat($id_pengguna)
    {
        $tiket = Tiket::where('id_pengguna_user', $id_pengguna)->first();
        return view('admin.subcontent.detail', ['tiket' => $tiket]);
    }
}
