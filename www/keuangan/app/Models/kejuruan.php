<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kejuruan extends Model
{
    use HasFactory;
    protected $fillable=[
        'kejuruan'
    ];
    public function siswa()
    {
        return $this->hasMany(siswa::class, 'kejuruan_id', 'id');
    }
}
