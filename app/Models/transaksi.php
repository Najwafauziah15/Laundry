<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id'; // jika primary field bukan id, wajib diubah disini
    public $incrementing = true; // jika primary key tidak auto increment ubah menjadi false
    protected $table = 'transaksi';
    protected $fillable = ['id_outlet', 'kode_invoice', 'id_member', 'tgl', 'batas_waktu', 'tgl_bayar', 'biaya_tambahan', 'diskon', 'pajak', 'status', 'dibayar', 'id_user'];

    // public function produk(){
    //     return $this->hasOne(Produk::class,'id', 'produk_id');
    // }
    
    public function Outlet() 
    { 
        return $this->belongsTo(Outlet::class);
    }
    public function Member() 
    { 
        return $this->belongsTo(Member::class);
    }
    public function User() 
    { 
        return $this->belongsTo(User::class);
    }
}
