<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';
    protected $guarded = ['no_ident', 'nama_lengkap', 'jenis_kelamin', 'alamat', 'no_telp'];
}