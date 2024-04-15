<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;
    protected $fillable=[
        'nis',
        'nama',
        'kelas_id',
        'kejuruan_id',
        'tahun_ajaran_id',
    ];
    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
    public function kejuruan()
    {
        return $this->belongsTo(kejuruan::class);
    }
    public function tahunAjaran()
    {
        return $this->belongsTo(tahunAjaran::class);
    }

}
