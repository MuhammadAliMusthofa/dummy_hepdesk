<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    protected $guarded = ['id_tiket'];
    public function pesan()
    {
        return $this->belongsTo(Pesan::class, 'id_tiket', 'id_tiket');
    }

    public function pesanPerTiket()
    {
        return $this->hasMany(Pesan::class, 'id_tiket', 'id_tiket');
    }
}
