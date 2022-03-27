<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    /**
     * atribut yang mendefinisikan tabel yang digunakan
    */
    protected $table = 'transaksi';
    /**
     * atribut guarded yang menjadi kebalikan dari fillable 
     * atribut ini dijaga untuk menentukan field yang tidak dapat ditetapkan secara masal
    */
    protected $guarded = ['id','created_at','updated_at'];

    /**
     * untuk merelasikan antar table
    */
    public function member() 
    { 
        return $this->belongsTo(Member::class, 'id_member');
    }
    public function detail_transaksi() 
    { 
        return $this->hasMany(Detail_Transaksi::class, 'id_member');
    }
}

