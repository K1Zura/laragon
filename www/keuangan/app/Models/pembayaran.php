<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $fillable=[
        'kategori',
        'tahun_ajaran_id',
        'class_id',
        'nominal',
    ];
    public function tahunAjaran()
    {
        return $this->belongsTo(tahunAjaran::class);
    }
    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
}
