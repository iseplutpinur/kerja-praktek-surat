<?php

use App\Http\Controllers\App\Penduduk\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\Penduduk\PengajuanSuratController;

$name = 'penduduk';
Route::get("/", [DashboardController::class, 'index'])
    ->name("$name.home")
    ->middleware("permission:$name.home");

$prefix = 'pengajuan_surat';
Route::prefix($prefix)->controller(PengajuanSuratController::class)->group(function () use ($name, $prefix) {
    $name = "$name.$prefix"; // penduduk.pengajuan
    Route::get('keterangan', 'keterangan')->name("$name.keterangan");
    Route::get('kelahiran', 'kelahiran')->name("$name.kelahiran");
    Route::get('domisili', 'domisili')->name("$name.domisili");
    Route::get('kartu_keluarga', 'kartu_keluarga')->name("$name.kartu_keluarga");
    Route::get('pindah', 'pindah')->name("$name.pindah");
    Route::get('nikah', 'nikah')->name("$name.nikah");
    Route::get('kematian', 'kematian')->name("$name.kematian");
});
