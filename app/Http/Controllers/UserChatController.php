<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserChatController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $id_pengguna = Auth::id();
        $timeNow = Carbon::now();
        $tiket = Tiket::where([
            'id_pengguna_user' => $id_pengguna,
            'status' => 0
        ])->orWhere('status', 1)->first();

        // membuat tiket jika tiket masih kosong
        if ($tiket == null) {
            Tiket::create([
                'id_pengguna_user' => $id_pengguna,
                'tanggal' => $timeNow->format('Y-m-d H:i:s'),
                'nama' => $user->user_name,
                'email' => $user->email,
                'departemen' => $user->role,
                'kadaluarsa' => $timeNow->addMinute(30)->format('Y-m-d H:i:s')
            ]);

            $tiket = Tiket::where([
                'id_pengguna_user' => $id_pengguna,
                'status' => 0
            ])->orWhere('status', 1)->first();

            event(new Message($tiket->id_tiket, 'new message'));
        }

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
