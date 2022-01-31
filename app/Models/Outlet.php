<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // jika primary field bukan id, wajib diubah disini
    public $incrementing = true; // jika primary key tidak auto increment ubah menjadi false
    protected $table = 'outlet';
    protected $fillable = ['nama', 'alamat', 'tlp'];

    public function Paket(){
        return $this->hasMany(Paket::class,'id_outlet');
    }
    public function User(){
        return $this->hasMany(User::class,'id_outlet');
    }
    public function canDelete(){
        return !$this->Paket()->exists();
    }
}
