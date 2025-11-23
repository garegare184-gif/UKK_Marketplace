<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Product;

class Toko extends Model
{
    //
    protected $table = 'toko';
    protected $fillable = [
        'nama_toko', 'deskripsi', 'gambar',
        'kontak_toko', 'alamat', 'id_user'
    ];
    public function pemilik() 
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class, 'id_toko');
    }
}
