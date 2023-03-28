<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Pesan;
use App\Models\Tiket;
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

        Pesan::create([
            'id_tiket' => $id_tiket,
            'id_pengguna' => $id_pengguna,
            'pesan' => $pesan
        ]);

        $this->notifikasi->index($id_tiket, $id_pengguna, $pesan, 'kirim');
    }
}
