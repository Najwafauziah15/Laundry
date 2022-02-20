<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = ['id','created_at','updated_at'];

    public function member() 
    { 
        return $this->belongsTo(Member::class, 'id_member');
    }
}

