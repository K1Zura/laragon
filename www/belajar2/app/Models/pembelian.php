<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;
    protected $fillable=[
        'kode_pembelian',
        'tanggal',
        'total',
        'jumlah',
        'user_id',
        'suplier_id',
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function suplier(){
        return $this->belongsTo(suplier::class);
    }
}
