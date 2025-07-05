<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_pekerjaan',
        'nama_perusahaan',
        'lokasi',
        'gaji',
        'deskripsi_pekerjaan',
    ];
}