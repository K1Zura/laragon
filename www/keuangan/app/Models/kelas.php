<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;
    protected $fillable=[
        'nama_kelas'
    ];
    public function siswa()
    {
        return $this->hasMany(siswa::class, 'kelas_id', 'id');
    }
    public function pembayaran()
    {
        return $this->hasMany(pembayaran::class, 'class_id', 'id');
    }
}
