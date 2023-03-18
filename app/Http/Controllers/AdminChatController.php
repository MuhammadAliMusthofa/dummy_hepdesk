<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
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
        $tikets = Tiket::all();
        $count = count($tikets);
        return view('admin.subcontent.antrian', ['count' => $count]);
    }

    public function pesan($id_tiket)
    {
        // return $id_pengguna;;
        $tikets = Tiket::where('id_tiket', $id_tiket)->with('pesanPerTiket')->get()->reverse();
        // // dd($pesans);
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

    public function kirimPesan(Request $request)
    {
        $tiket = Tiket::where('id_tiket', $request->id_tiket)->first();
        $id_tiket = $request->id_tiket;
        $id_pengguna = $request->id_pengguna;
        $pesan = $request->pesan;

        $data = new Pesan();
        $data->id_tiket = $id_tiket;
        $data->id_pengguna = $id_pengguna;
        $data->pesan = $pesan;
        $data->save();

        event(new Message($tiket->id_pengguna_user, $pesan));
    }
}
