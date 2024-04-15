<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $fillable=[
        'kode_penjualan',
        'tanggal',
        'total_harga',
        'pelanggan_id',
    ];
}
