<?php

namespace App\Http\Controllers;

use App\Events\Message;
use App\Models\Pesan;
use App\Models\Tiket;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function kirimPesan(Request $request)
    {
        $id_tiket = $request->id_tiket;
        $id_pengguna = $request->id_pengguna;
        $pesan = $request->pesan;

        $data = new Pesan();
        $data->id_tiket = $id_tiket;
        $data->id_pengguna = $id_pengguna;
        $data->pesan = $pesan;
        $data->save();

        event(new Message($id_tiket, $pesan));
    }
}
