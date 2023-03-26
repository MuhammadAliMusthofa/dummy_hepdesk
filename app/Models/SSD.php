<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SSD extends Model
{
    protected $table = 'SSD';
    protected $guarded = ['id_ssd'];

    protected $fillable = ['nomor', 'pertanyaan', 'jawaban', 'tanggal', 'id_role_pengguna', 'active'];
}
