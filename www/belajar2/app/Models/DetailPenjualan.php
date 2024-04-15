<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $fillable=[
        'penjualan_id',
        'produk_id',
        'jumlah',
        'subTotal',
        'tanggal',
    ];

    public function penjualan(){
        return $this->belongsTo(penjualan::class);
    }

    public function produk(){
        return $this->belongsTo(produk::class);
    }
}
