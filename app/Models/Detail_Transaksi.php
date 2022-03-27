<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Transaksi extends Model
{
    use HasFactory;
    
    /**
     * atribut yang mendefinisikan tabel yang digunakan
    */
    protected $primaryKey = 'id'; 
    /**
     * atribut yang di gunakan untuk auto increment atau numeric pada primary key
    */
    public $incrementing = true;
    /**
     * atribut yang mendefinisikan tabel yang digunakan
    */
    protected $table = 'detail_transaksi';
    /**
     * atribut yang di lindungi dan akan di gunakan pada saat pengisian field database barang
     * atribut ini dapat digunakan secara masal 
    */
    protected $fillable = ['id_transaksi', 'id_paket', 'qty', 'keterangan'];
    
    /**
     * untuk merelasikan antar table
    */
    public function transaksi() 
    { 
        return $this->belongsTo(transaksi::class, 'id_transaksi');
    }
    public function paket() 
    { 
        return $this->belongsTo(Paket::class, 'id_paket');
    }
}
