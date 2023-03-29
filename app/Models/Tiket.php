<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';
    protected $guarded = ['id_tiket'];

    protected $fillable = ['id_pengguna_user', 'id_pengguna_admin', 'tanggal', 'nama', 'email', 'asal_pt', 'departemen', 'kadaluarsa', 'status'];

    public function pengguna_user()
    {
        return $this->belongsTo(User::class, 'id_pengguna_user', 'id_pengguna');
    }
    public function pengguna_admin()
    {
        return $this->belongsTo(User::class, 'id_pengguna_admin', 'id_pengguna');
    }
    public function pesan()
    {
        return $this->belongsTo(Pesan::class, 'id_tiket', 'id_tiket');
    }

    public function pesanPerTiket()
    {
        return $this->hasMany(Pesan::class, 'id_tiket', 'id_tiket');
    }
}
