<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    public function index(){
        $dokter = Dokter::get();

        return response()->json([
            'status'    => true,
            'message'   => 'Berhasil Mendapatkan Data Dokter',
            'data'      => $dokter
        ]);
    }

    public function show($id){
        $dokter = Dokter::find($id);
        
        if($dokter != null){
            return response()->json([
                'status'    => true,
                'message'   => 'Berhasil Mendapatkan Data Dokter',
                'data'      => $dokter
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Data Dokter Tidak Ditemukan!',
            ]);
        }
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'nama_dokter'   => 'required',
            'spesialis'     => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal Menambah Dokter! Silahkan Lengkapi Data!',
                'data'      => $validate->errors()
            ]);
        }else{
            $tambah_dokter = Dokter::insert($request->all());

            if($tambah_dokter){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Menambahkan Dokter'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Menambahkan Dokter'
                ]);
            }
        }
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'nama_dokter'   => 'required',
            'spesialis'     => 'required',
            'alamat'        => 'required',
            'no_telp'       => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal Mengubah Data Dokter! Silahkan Lengkapi Data!',
                'data'      => $validate->errors()
            ]);
        }else{
            $dokter = Dokter::where('id', $id)->update($request->all());

            if($dokter){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Mengubah Data Dokter'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Mengubah Data Dokter'
                ]);
            }
        }
    }

    public function delete($id){
        $dokter = Dokter::where('id', $id)->first();

        if($dokter != null){
            if($dokter->delete()){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Menghapus Data Dokter'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Menghapus Data Dokter'
                ]);
            }
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Data Dokter Tidak Ditemukan'
            ]);
        }
    }
}
