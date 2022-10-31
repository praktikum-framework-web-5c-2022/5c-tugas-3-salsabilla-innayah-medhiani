<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table='dosen';
    protected $fillable = [
        'nidn',
        'nama',
        'jenis_kelamin',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
    ];
    use HasFactory;
}