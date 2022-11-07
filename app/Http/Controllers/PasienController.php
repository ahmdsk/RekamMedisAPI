<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PasienController extends Controller
{
    public function index(){
        $pasien = Pasien::get();

        return response()->json([
            'status'    => true,
            'message'   => 'Berhasil Mendapatkan Data Pasien',
            'data'      => $pasien
        ]);
    }

    public function show($id){
        $pasien = Pasien::find($id);
        
        if($pasien != null){
            return response()->json([
                'status'    => true,
                'message'   => 'Berhasil Mendapatkan Data Pasien',
                'data'      => $pasien
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Data Pasien Tidak Ditemukan!',
            ]);
        }
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'no_ident'      => 'required',
            'nama_lengkap'  => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal Menambah Pasien! Silahkan Lengkapi Data!',
                'data'      => $validate->errors()
            ]);
        }else{
            $tambah_pasien = Pasien::insert($request->all());

            if($tambah_pasien){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Menambahkan Pasien'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Menambahkan Pasien'
                ]);
            }
        }
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'no_ident'      => 'required',
            'nama_lengkap'  => 'required',
            'jenis_kelamin' => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal Mengubah Pasien! Silahkan Lengkapi Data!',
                'data'      => $validate->errors()
            ]);
        }else{
            $pasien = Pasien::where('id', $id)->update($request->all());

            if($pasien){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Mengubah Pasien'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Mengubah Pasien'
                ]);
            }
        }
    }

    public function delete($id){
        $pasien = Pasien::where('id', $id)->first();

        if($pasien != null){
            if($pasien->delete()){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Menghapus Data Pasien'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Menghapus Data Pasien'
                ]);
            }
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Data Pasien Tidak Ditemukan'
            ]);
        }
    }
}
