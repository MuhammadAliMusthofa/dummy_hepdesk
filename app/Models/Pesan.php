<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'pesan';


    protected $guarded = ['id_pesan'];

    protected $fillable = ['id_tiket', 'id_pengguna', 'pesan'];
}
