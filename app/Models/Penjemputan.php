<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjemputan extends Model
{
    use HasFactory;//proprerty

    protected $primaryKey = 'id'; //modifier // jika primary field bukan id, wajib diubah disini
    public $incrementing = true; //modifier // jika primary key tidak auto increment ubah menjadi false
    protected $table = 'penjemputan'; //modifier
    protected $fillable = ['id_member', 'petugas', 'status']; //modifier

    public function Member() 
    { 
        return $this->belongsTo(Member::class, 'id_member');
    }
}
