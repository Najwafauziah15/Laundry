<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    /**
     * atribut yang di dilindungi sebagai primary key
    */
    protected $primaryKey = 'id';
    /**
     * atribut yang di gunakan untuk auto increment atau numeric pada primary key
    */ 
    public $incrementing = true; 
    /**
     * atribut yang mendefinisikan tabel yang digunakan
    */
    protected $table = 'barang';
    /**
     * atribut yang di lindungi dan akan di gunakan pada saat pengisian field database barang
     * atribut ini dapat digunakan secara masal 
    */
    protected $fillable = ['nama_barang', 'qty', 'harga', 'waktu_beli', 'supplier', 'status', 'waktu_update'];
}
