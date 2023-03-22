<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiket', function (Blueprint $table) {
            $table->increments('id_tiket');
            $table->char('id_pengguna_user');
            $table->char('id_pengguna_admin')->nullable();
            $table->date('tanggal');
            $table->string('nama');
            $table->string('email');
            $table->string('departemen');
            $table->dateTime('kadaluarsa')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('tiket');
    }
}
