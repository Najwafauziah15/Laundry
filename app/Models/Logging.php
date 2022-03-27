<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logging extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // jika primary field bukan id, wajib diubah disini
    public $incrementing = true; // jika primary key tidak auto increment ubah menjadi false
    protected $table = 'logging';
    protected $fillable = ['aksi', 'nama_table', 'waktu'];

    public function user() 
    { 
        return $this->belongsTo(User::class, 'id_user');
    }
}
