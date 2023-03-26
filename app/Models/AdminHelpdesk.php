<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminHelpdesk extends Model
{
    protected $table = 'admin_helpdesk';
    protected $guarded = ['id_admin_helpdesk'];

    protected $fillable = ['id_admin_helpdesk', 'id_pengguna', 'active'];
}
