<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliklinik extends Model
{
    use HasFactory;

    protected $table = 'poliklinik';
    protected $guarded = ['nama_poliklinik', 'gedung'];
}   