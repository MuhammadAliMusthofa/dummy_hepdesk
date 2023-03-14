<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('user_name');
            $table->string('password');
            $table->string('nm_pengguna')->nullable();
            // $table->date('tgl_lahir');
            // $table->string('tempat_lahir');
            // $table->string('jenis_kelamin');
            // $table->integer('id_wil');
            // $table->integer('id_sdm_pengguna');
            // $table->integer('approval_pengguna');
            // $table->integer('a_aktif');
            $table->integer('role')->default(1);
            $table->string('email');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
