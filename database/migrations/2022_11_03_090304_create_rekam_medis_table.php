<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();
            $table->string('diagnosa');
            $table->text('keluhan')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->foreignId('id_pasien')->references('id')->on('pasien');
            $table->foreignId('id_dokter')->references('id')->on('dokter');
            $table->foreignId('id_obat')->references('id')->on('obat');
            $table->foreignId('id_poliklinik')->references('id')->on('poliklinik');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rekam_medis');
    }
}
