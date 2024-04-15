<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    use HasFactory;
    protected $fillable=[
        'pembelian_id',
        'produk_id',
        'jumlah',
        'subTotal',
        'tanggal',
    ];

    public function pembelian(){
        return $this->belongsTo(pembelian::class);
    }

    public function produk(){
        return $this->belongsTo(produk::class);
    }
}
