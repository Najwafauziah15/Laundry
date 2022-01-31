<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // jika primary field bukan id, wajib diubah disini
    public $incrementing = true; // jika primary key tidak auto increment ubah menjadi false
    protected $table = 'member';
    protected $fillable = ['nama', 'alamat', 'jenis_kelamin', 'tlp'];

    // public function produk(){
    //     return $this->hasOne(Produk::class,'id', 'produk_id');
    // }
}
