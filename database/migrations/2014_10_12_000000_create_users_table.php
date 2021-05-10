<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nim')->unique();
            $table->string('email')->unique();
            $table->string('jenis_kelamin');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('prodi');
            $table->string('fakultas');
            $table->string('no_hp');
            $table->string('keluarga');
            $table->string('foto');
            $table->string('periode');
            $table->string('role');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        // Schema::create('users', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->bigInteger('role_id')->unsigned()->default(0);
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
