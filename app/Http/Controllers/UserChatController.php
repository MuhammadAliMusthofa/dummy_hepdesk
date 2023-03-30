<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserChatController extends Controller
{
    public $notifikasi;
    public function __construct()
    {
        $this->notifikasi = new NotifikasiController;
    }
    public function index()
    {
        $user = Auth::user();
        $id_pengguna = Auth::id();
        $timeNow = Carbon::now();
        $tiket = Tiket::where([
            'id_pengguna_user' => $id_pengguna,
            ['status', '!=', 3]
        ])->first();

        // dd(count($tiket));
        // membuat tiket jika tiket masih kosong
        if (count($tiket) == 0) {
            Tiket::create([
                'id_pengguna_user' => $id_pengguna,
                'tanggal' => $timeNow->format('Y-m-d H:i:s'),
                'nama' => $user->user_name,
                'email' => $user->email,
                'departemen' => $user->role,
            ]);

            $tiket = Tiket::where([
                'id_pengguna_user' => $id_pengguna,
                'status' => 0
            ])->orWhere('status', 1)->first();

            Pesan::create([
                'id_tiket' => $tiket->id_tiket,
                'pesan' => 'Selamat datang di layanan informasi Sistem Terintegrasi BKD Silakan tuliskan pertanyaan anda'
            ]);

            Pesan::create([
                'id_tiket' => $tiket->id_tiket,
                'pesan' => 'Silahkan Melengkapi informasi berikut:<br />Nama:<br /> NIDN:<br /> Instansi:<br /> Versi SISTER:<br /> Keluhan:'
            ]);


            $this->notifikasi->index($tiket->id_tiket, $user->user_name, 'Antrian baru', 'membuat tiket');
        }

        return view('users.pesan', ['tiket' => $tiket]);
    }
    public function pesan($id_tiket)
    {
        $tiket = Tiket::where([
            'id_tiket' => $id_tiket,
            ['status', '!=', 3]
        ])->with('pesanPerTiket')->first();
        // dd($tikets);
        return view(
            'users.isi_pesan',
            ['tiket' => $tiket]
        );
    }

    public function akhiri($id_tiket)
    {
        $tiket = Tiket::where('id_tiket', $id_tiket)->first();
        if ($tiket) {
            Tiket::where([
                'id_tiket' => $id_tiket,
            ])->update([
                'status' => 3,
                'kadaluarsa' => null
            ]);

            $this->notifikasi->index($tiket->id_tiket, $tiket->nama, 'Admin mengakhiri obrolan', 'diakhiri');

            return response('pesan diakhiri');
        } else {
            return response('gagal mengakhiri pesan', 400);;
        }
    }

    public function riwayat()
    {
        $id_pengguna = Auth::id();
        $tikets = Tiket::where([
            'id_pengguna_user' => $id_pengguna,
            'status' => 3
        ])->orWhere('status', 2)->paginate(10);
        return view('users.riwayat_keluhan', [
            'tikets' => $tikets
        ]);
    }

    public function detailRiwayat($id_tiket)
    {
        $id_pengguna = Auth::id();
        $tiket = Tiket::where([
            'id_tiket' => $id_tiket,
            'id_pengguna_user' => $id_pengguna
        ])->with(['pesan', 'pengguna_admin'])->first();
        return view('users.riwayat_detail', ['tiket' => $tiket]);
    }



    public function search(Request $request)
    {

        $query = $request->input('query');
        $tikets = Tiket::where('id_tiket', 'LIKE', "%$query%")
            ->orWhere('tanggal', 'LIKE', "%$query%")
            ->orWhere('nama', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->orWhere('departemen', 'LIKE', "%$query%")
            ->orWhere('status', 'LIKE', "%$query%")
            ->get();
        return view('users.riwayat_search', compact('tikets', 'query'));
    }
}
