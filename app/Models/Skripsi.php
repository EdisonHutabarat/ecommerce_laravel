<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skripsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'nama', 'nim', 'angkatan', 'Dosen Pembimbing 1', 'Dosen Pembimbing 2'
    ];
}
