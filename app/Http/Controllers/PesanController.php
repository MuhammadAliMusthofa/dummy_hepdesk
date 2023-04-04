<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Pesan;
use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public $notifikasi;
    public function __construct()
    {
        $this->notifikasi = new NotifikasiController;
    }
    public function kirimPesan(Request $request)
    {
        $id_tiket = $request->id_tiket;
        $id_pengguna = $request->id_pengguna;
        $pesan = $request->pesan;

        $tiket = Tiket::where([
            'id_tiket' => $id_tiket,
            'status' => 2,
        ]);

        $thisTiket = Tiket::where([
            'id_tiket' => $id_tiket,
        ])->first();

        Pesan::create([
            'id_tiket' => $id_tiket,
            'id_pengguna' => $id_pengguna,
            'pesan' => $pesan
        ]);

        if ($thisTiket->id_pengguna_admin == null) {
            Pesan::create([
                'id_tiket' => $id_tiket,
                'pesan' => 'Kami telah menampung pertanyaan anda. Mohon menunggu sebentar, kami akan segera merespons anda'
            ]);
        }

        if ($tiket->get() && $thisTiket->id_pengguna_admin == $id_pengguna) {
            $time = Carbon::now()->addMinute(30)->format('Y-m-d H:i:s');
            $tiket->update([
                'status' => 1,
                'kadaluarsa' => $time
            ]);
        }

        $this->notifikasi->index($id_tiket, $id_pengguna, $pesan, 'kirim');
    }
}
