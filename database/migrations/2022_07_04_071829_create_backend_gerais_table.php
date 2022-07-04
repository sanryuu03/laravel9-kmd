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
        Schema::create('backend_gerais', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('users_id');
            $table->string('nomor_hp_bisnis_developer')->nullable();
            $table->string('bisnis_developer')->nullable();
            $table->string('status_gerai')->default('belum bayar');
            $table->string('nama_gerai')->nullable();
            $table->string('nama_pengelola')->nullable();
            $table->string('nik')->nullable();
            $table->string('telp')->nullable();
            $table->string('wa')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status_pernikahan')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('lingkungan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('keahlian')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('rekening_bank')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('npwp')->nullable();
            $table->string('picture_path_ktp')->nullable();
            $table->string('picture_path_profile')->nullable();
            $table->string('post_by')->nullable();
            $table->string('edited_by')->nullable();
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
        Schema::dropIfExists('backend_gerais');
    }
};
