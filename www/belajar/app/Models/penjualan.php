<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
    protected $fillable=[
        'kode_penjualan',
        'total',
        'dibayar',
        'kembalian',
        'tanggal',
        'pelanggan_id',
        'user_id',
    ];

    public function pelanggan(){
        return $this->belongsTo(pelanggan::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
