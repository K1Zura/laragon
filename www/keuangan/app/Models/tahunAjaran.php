<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tahunAjaran extends Model
{
    use HasFactory;
    protected $fillable=[
        'tahun_ajaran'
    ];
    public function pembayaran()
    {
        return $this->hasMany(pembayaran::class, 'tahun_ajaran_id', 'id');
    }
    public function siswa()
    {
        return $this->hasMany(siswa::class, 'tahun_ajaran_id', 'id');
    }
}
