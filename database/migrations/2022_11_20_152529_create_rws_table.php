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
        Schema::create('rws', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable()->default(null);
            $table->string('nama_ketua')->nullable()->default(null);
            $table->string('nama_daerah')->nullable()->default(null)->comment('Nama kampung atau yg lain');
            $table->bigInteger('ketua_id', false, true)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rws');
    }
};
