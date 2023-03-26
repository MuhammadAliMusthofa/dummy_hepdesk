<?php

namespace App\Http\Controllers;

use App\Events\Message;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index($id_tiket, $nama, $pesan, $aksi)
    {
        event(new Message($id_tiket, $nama, $pesan, $aksi));
    }
}
