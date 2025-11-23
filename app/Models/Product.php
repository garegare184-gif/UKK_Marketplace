<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'id_kategori',
        'id_toko',
        'nama_produk',
        'harga',
        'stok',
        'deskripsi',
        'tanggal_upload',
        'gambar'
    ];
    // RELASI KE KATEGORI
    public function kategori()
    {
    return $this->belongsTo(Category::class, 'id_kategori');
    }
    // RELASI KE TOKO
    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}
