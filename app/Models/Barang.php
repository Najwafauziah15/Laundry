<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // jika primary field bukan id, wajib diubah disini
    public $incrementing = true; // jika primary key tidak auto increment ubah menjadi false
    protected $table = 'barang_inventaris';
    protected $fillable = ['nama_barang', 'merk_barang', 'qty', 'kondisi', 'tanggal_pengadaan'];
}
