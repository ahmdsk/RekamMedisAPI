<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $table = 'rekam_medis';
    protected $guarded = ['diagnosa', 'keluhan', 'created_at', 'updated_at', 'id_pasien', 'id_dokter', 'id_obat', 'id_poliklinik'];

    public function pasien(){
        return $this->hasOne(Pasien::class, 'id', 'id_pasien');
    }

    public function dokter(){
        return $this->hasOne(Dokter::class, 'id', 'id_dokter');
    }
    
    public function obat(){
        return $this->hasOne(Obat::class, 'id', 'id_obat');
    }

    public function poliklinik(){
        return $this->hasOne(Poliklinik::class, 'id', 'id_poliklinik');
    }
}