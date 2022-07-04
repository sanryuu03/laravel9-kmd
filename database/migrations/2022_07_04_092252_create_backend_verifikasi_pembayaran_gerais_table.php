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
        Schema::create('backend_verifikasi_pembayaran_gerais', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('backend_gerais_id');
            $table->string('biaya_pembukaan_gerai')->nullable();
            $table->string('rekening_pembayaran')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('atas_nama_rekening')->nullable();
            $table->string('picture_path_slip_pembayaran')->nullable();
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
        Schema::dropIfExists('backend_verifikasi_pembayaran_gerais');
    }
};
