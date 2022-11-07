<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PoliklinikController extends Controller
{
    public function index(){
        $poliklinik = Poliklinik::get();

        return response()->json([
            'status'    => true,
            'message'   => 'Berhasil Mendapatkan Data Poliklinik',
            'data'      => $poliklinik
        ]);
    }

    public function show($id){
        $poliklinik = Poliklinik::find($id);
        
        if($poliklinik != null){
            return response()->json([
                'status'    => true,
                'message'   => 'Berhasil Mendapatkan Data Poliklinik',
                'data'      => $poliklinik
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Data Poliklinik Tidak Ditemukan!',
            ]);
        }
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'nama_poliklinik'   => 'required',
            'gedung'            => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal Menambah Poliklinik! Silahkan Lengkapi Data!',
                'data'      => $validate->errors()
            ]);
        }else{
            $tambah_klinik = Poliklinik::insert($request->all());

            if($tambah_klinik){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Menambahkan Poliklinik'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Menambahkan Poliklinik'
                ]);
            }
        }
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'nama_poliklinik'   => 'required',
            'gedung'            => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal Mengubah Data Poliklinik! Silahkan Lengkapi Data!',
                'data'      => $validate->errors()
            ]);
        }else{
            $poliklinik = Poliklinik::where('id', $id)->update($request->all());

            if($poliklinik){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Mengubah Data Poliklinik'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Mengubah Data Poliklinik'
                ]);
            }
        }
    }

    public function delete($id){
        $poliklinik = Poliklinik::where('id', $id)->first();

        if($poliklinik != null){
            if($poliklinik->delete()){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Menghapus Data Poliklinik'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Menghapus Data Poliklinik'
                ]);
            }
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Data Poliklinik Tidak Ditemukan'
            ]);
        }
    }
}