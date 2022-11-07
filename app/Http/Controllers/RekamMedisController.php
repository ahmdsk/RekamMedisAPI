<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index(){
        $data = RekamMedis::with('pasien', 'dokter', 'obat', 'poliklinik')->get();

        $rekam_medis = [];
        foreach($data as $rm){
            array_push($rekam_medis, [
                'nama_pasien'   => $rm->pasien->nama_lengkap,
                'jenkel_pasien' => $rm->pasien->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan',
                'no_telp'       => $rm->pasien->no_telp,
                'alamat_pasien'        => $rm->pasien->alamat,
                'diagnosa'      => $rm->diagnosa,
                'keluhan'       => $rm->keluhan,
                'nama_dokter'   => $rm->dokter->nama_dokter,
                'spesialis'     => $rm->dokter->spesialis,
                'obat'          => $rm->obat->nama_obat,
                'klinik'        =>  $rm->poliklinik->nama_poliklinik
            ]);
        }

        return response()->json([
            'status'    => true,
            'message'   => 'Berhasil Mendapatkan Data Rekam Medis',
            'data'      => $rekam_medis
        ]);
    }
}
