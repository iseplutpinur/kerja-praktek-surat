<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_pindah_pengikuts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('surat_pindah_id', false, true)->nullable()->default(null);
            $table->bigInteger('penduduk_id', false, true)->nullable()->default(null);

            $table->string('nik')->nullable()->default(null);
            $table->string('nama')->nullable()->default(null);
            $table->string('nik_jenis')->nullable()->default(null)->comment('No KTP, KTP Sementara');
            $table->string('jenis_kelamin')->nullable()->default(null);
            $table->string('tempat_lahir')->nullable()->default(null);
            $table->date('tanggal_lahir')->nullable()->default(null);
            $table->string('agama')->nullable()->default(null);
            $table->string('pendidikan')->nullable()->default(null);
            $table->string('pekerjaan')->nullable()->default(null);
            $table->string('status_kawin')->nullable()->default(null);
            $table->string('no_kk')->nullable()->default(null);
            $table->string('warga_negara')->nullable()->default(null);
            $table->string('negara_nama')->nullable()->default(null);
            $table->string('no_passport')->nullable()->default(null);
            $table->string('kitas_kitap')->nullable()->default(null);
            $table->string('foto_ktp')->nullable()->default(null);

            $table->timestamps();

            $table->foreign('surat_pindah_id')
                ->references('id')->on('surat_pindahs')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('penduduk_id')
                ->references('id')->on('penduduks')
                ->nullOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_pindah_pengikuts');
    }
};
