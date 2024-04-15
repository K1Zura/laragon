<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class siswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nis',
        'nama',
        'image',
        'kelas_id',
        'tahun_ajaran_id',
    ];

    /**
     * Get the kelas that owns the siswa
     *
     * @return BelongsTo
     */
    public function kelas(): BelongsTo
    {
        return $this->belongsTo(kelas::class, 'kelas_id', 'id');
    }
    public function tahunAjaran(): BelongsTo
    {
        return $this->belongsTo(tahunAjaran::class, 'tahun_ajaran_id', 'id');
    }

}
