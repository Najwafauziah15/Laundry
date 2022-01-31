<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Transaksi extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id'; // jika primary field bukan id, wajib diubah disini
    public $incrementing = true; // jika primary key tidak auto increment ubah menjadi false
    protected $table = 'detail_transaksi';
    protected $fillable = ['id_transaksi', 'id_paket', 'qty', 'keterangan'];

    // public function produk(){
    //     return $this->hasOne(Produk::class,'id', 'produk_id');
    // }
    
    public function transaksi() 
    { 
        return $this->belongsTo(transaksi::class);
    }
    public function paket() 
    { 
        return $this->belongsTo(Paket::class);
    }
}
