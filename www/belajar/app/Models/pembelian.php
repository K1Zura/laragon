<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;
    protected $fillable=[
        'kode_pembelian',
        'total',
        'dibayar',
        'kembalian',
        'tanggal',
        'suplier_id',
    ];

    public function suplier(){
        return $this->belongsTo(suplier::class);
    }
}
