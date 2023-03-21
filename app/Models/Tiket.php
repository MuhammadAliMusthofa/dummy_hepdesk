<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    protected $guarded = ['id_tiket'];

    protected $fillable = ['id_pengguna_user', 'id_pengguna_admin', 'tanggal', 'nama', 'email', 'asal_pt', 'departemen', 'sisa_waktu', 'status'];
    public function pesan()
    {
        return $this->belongsTo(Pesan::class, 'id_tiket', 'id_tiket');
    }

    public function pesanPerTiket()
    {
        return $this->hasMany(Pesan::class, 'id_tiket', 'id_tiket');
    }
}
