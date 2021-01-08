<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiPeriodiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai_periodiks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('keluarga');
            $table->string('pekan_ke');
            $table->string('tanggal');
            $table->string('kehadiran');
            $table->string('ukhuwah_islamiyah');
            $table->string('ukhuwah_wathoniyah');
            $table->string('fardu_kifayah');
            $table->string('hafalan_doa');
            $table->string('baca_quran');
            $table->string('sholat_fardu');
            $table->string('tilawatil_quran');
            $table->string('dzikir');
            $table->string('buku_harian');
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
        Schema::dropIfExists('nilai_periodiks');
    }
}
