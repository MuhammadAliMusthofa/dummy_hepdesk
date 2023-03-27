<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $table = 'tiket';

    // public function searchAndDisplay($key = null, $start = 0, $length = 0)
    // {
    //     $query = Tiket::query();
    //     if ($key) {
    //         $arrKey = explode(" ", $key);
    //         for ($i=0; $i < count($arrKey); $i++) { 
    //             $query = $query->where('nama', 'like', '%'.$arrKey[$i].'%')
    //                            ->orWhere('email', 'like', '%'.$arrKey[$i].'%');
    //         }
    //     }
    //     if ($start != 0 or $length != 0) {
    //         $query = $query->skip($start)->take($length);
    //     }
    //     $results = $query->orderBy('nama')->get();
    //     return $results;
    // }
}
