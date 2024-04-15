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
        'total',
        'dibayar',
        'kembalian',
        'user_id',
        'pelanggan_id',
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function pelanggan(){
        return $this->belongsTo(pelanggan::class);
    }
}
