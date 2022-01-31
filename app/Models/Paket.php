<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    use HasFactory;
    
    protected $primaryKey = 'id'; // jika primary field bukan id, wajib diubah disini
    public $incrementing = true; // jika primary key tidak auto increment ubah menjadi false
    protected $table = 'paket';
    protected $fillable = ['id_outlet', 'jenis', 'nama_paket', 'harga'];

    // public function produk(){
    //     return $this->hasOne(Produk::class,'id', 'produk_id');
    // }
    
    public function outlet() 
    { 
        return $this->belongsTo(Outlet::class, 'id_outlet');
    }
}
