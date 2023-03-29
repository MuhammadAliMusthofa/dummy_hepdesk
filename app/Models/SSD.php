<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SSD extends Model
{
    protected $table = 'ssd';
    protected $guarded = ['id_ssd'];
    protected $primaryKey = 'id_ssd';

    protected $fillable = ['nomor', 'pertanyaan', 'jawaban', 'tanggal', 'id_role_pengguna', 'active', 'created_by', 'updated_by'];

    public function users()
    {
        return $this->hasMany('App\User', 'id_pengguna');
    }
}
