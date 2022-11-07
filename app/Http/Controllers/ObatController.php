<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ObatController extends Controller
{
    public function index(){
        $obat = Obat::get();

        return response()->json([
            'status'    => true,
            'message'   => 'Berhasil Mendapatkan Data Obat',
            'data'      => $obat
        ]);
    }

    public function show($id){
        $obat = Obat::find($id);
        
        if($obat != null){
            return response()->json([
                'status'    => true,
                'message'   => 'Berhasil Mendapatkan Data Obat',
                'data'      => $obat
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Data Obat Tidak Ditemukan!',
            ]);
        }
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(), [
            'nama_obat'     => 'required',
            'keterangan'    => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal Menambah Obat! Silahkan Lengkapi Data!',
                'data'      => $validate->errors()
            ]);
        }else{
            $tambah_obat = Obat::insert($request->all());

            if($tambah_obat){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Menambahkan Obat'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Menambahkan Obat'
                ]);
            }
        }
    }

    public function update(Request $request, $id){
        $validate = Validator::make($request->all(), [
            'nama_obat'     => 'required',
            'keterangan'    => 'required',
        ]);

        if($validate->fails()){
            return response()->json([
                'status'    => false,
                'message'   => 'Gagal Mengubah Data Obat! Silahkan Lengkapi Data!',
                'data'      => $validate->errors()
            ]);
        }else{
            $obat = Obat::where('id', $id)->update($request->all());

            if($obat){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Mengubah Data Obat'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Mengubah Data Obat'
                ]);
            }
        }
    }

    public function delete($id){
        $obat = Obat::where('id', $id)->first();

        if($obat != null){
            if($obat->delete()){
                return response()->json([
                    'status'    => true,
                    'message'   => 'Berhasil Menghapus Data Obat'
                ]);
            } else {
                return response()->json([
                    'status'    => false,
                    'message'   => 'Gagal Menghapus Data Obat'
                ]);
            }
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Data Obat Tidak Ditemukan'
            ]);
        }
    }
}
