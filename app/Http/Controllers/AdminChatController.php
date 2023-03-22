<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Carbon\Carbon;
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

    public function admin_chat_main($status, $id_pengguna)
    {
        $tikets = Tiket::where([
            'status' => $status,
            'id_pengguna_admin' => $id_pengguna
        ])->with('pesan')->get();

        if ($status == 0) {
            $tikets = Tiket::where([
                'status' => 0,
                'id_pengguna_admin' => null
            ])->with('pesan')->get();
        }
        return view('admin.admin_chat_main', ['tikets' => $tikets]);
    }

    public function antrian()
    {
        $tikets = Tiket::where([
            'status' => 0,
            'id_pengguna_admin' => null
        ])->get();
        $count = count($tikets);
        return view('admin.subcontent.antrian', ['count' => $count]);
    }

    public function pesan($id_tiket)
    {
        $tiket = Tiket::where([
            'id_tiket' => $id_tiket,
        ])->with('pesanPerTiket')->first();
        return view(
            'admin.subcontent.chat_user',
            ['tiket' => $tiket]
        );
    }

    public function pesanTerima($id_tiket, $id_pengguna)
    {
        $tiket = Tiket::where([
            'id_tiket' => $id_tiket,
            'id_pengguna_admin' => null
        ])->first();

        if ($tiket) {
            Tiket::where([
                'id_tiket' => $id_tiket,
            ])->update([
                'id_pengguna_admin' => $id_pengguna,
                'status' => 1,
                'kadaluarsa' => Carbon::now()->addMinute(30)->format('Y-m-d H:i:s')
            ]);
            return response('berhasil menerima data');
        } else {
            return response('gagal menerima tiket karena sudah diterima helpdesk lain', 400);;
        }
    }
    public function detail($id_tiket)
    {
        $tiket = Tiket::where('id_tiket', $id_tiket)->first();
        return view('admin.subcontent.detail', ['tiket' => $tiket]);
    }

    public function akhiriPesan($id_tiket)
    {
        $tiket = Tiket::where('id_tiket', $id_tiket)->first();
        if ($tiket) {
            Tiket::where([
                'id_tiket' => $id_tiket,
            ])->update([
                'status' => 3,
                'kadaluarsa' => null
            ]);
            return response('pesan diakhiri');
        } else {
            return response('gagal mengakhiri pesan', 400);;
        }
    }
}
