<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_produk';
    public $incrementing = true;
    public $keyType = 'int';

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

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'id_toko');
    }
}

