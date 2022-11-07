<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\RekamMedisController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Welcome API
Route::get('/', function(){
    return response()->json([
        'status'  => true,
        'message' => 'Hello! Welcome To Rekam Medis API',
    ]);
});

// API Data Pasien
Route::get('/pasien', [PasienController::class, 'index']);
Route::post('/pasien', [PasienController::class, 'store']);
Route::get('/pasien/{id}', [PasienController::class, 'show']);
Route::put('/pasien/{id}', [PasienController::class, 'update']);
Route::delete('/pasien/{id}', [PasienController::class, 'delete']);

// API Data Dokter
Route::get('/dokter', [DokterController::class, 'index']);
Route::post('/dokter', [DokterController::class, 'store']);
Route::get('/dokter/{id}', [DokterController::class, 'show']);
Route::put('/dokter/{id}', [DokterController::class, 'update']);
Route::delete('/dokter/{id}', [DokterController::class, 'delete']);

// API Data Obat
Route::get('/obat', [ObatController::class, 'index']);
Route::post('/obat', [ObatController::class, 'store']);
Route::get('/obat/{id}', [ObatController::class, 'show']);
Route::put('/obat/{id}', [ObatController::class, 'update']);
Route::delete('/obat/{id}', [ObatController::class, 'delete']);

// API Poliklinik
Route::get('/poliklinik', [PoliklinikController::class, 'index']);
Route::post('/poliklinik', [PoliklinikController::class, 'store']);
Route::get('/poliklinik/{id}', [PoliklinikController::class, 'show']);
Route::put('/poliklinik/{id}', [PoliklinikController::class, 'update']);
Route::delete('/poliklinik/{id}', [PoliklinikController::class, 'delete']);

// API Rekam Medis
Route::get('/rekammedis', [RekamMedisController::class, 'index']);
Route::post('/rekammedis', [RekamMedisController::class, 'store']);
Route::get('/rekammedis/{id}', [RekamMedisController::class, 'show']);
Route::put('/rekammedis/{id}', [RekamMedisController::class, 'update']);
Route::delete('/rekammedis/{id}', [RekamMedisController::class, 'delete']);