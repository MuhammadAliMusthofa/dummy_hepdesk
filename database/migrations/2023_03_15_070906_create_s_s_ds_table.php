<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSSDsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ssd', function (Blueprint $table) {
            $table->increments('id_ssd');
            $table->text('pertanyaan');
            $table->text('jawaban');
            $table->dateTime('tanggal');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('updated_by');
            $table->string('id_role_pengguna');
            $table->string('kategori');
            $table->string('status')->nullable();
            $table->timestamps();
            $table->foreign('created_by')->references('id_pengguna')->on('users')->onDelete('cascade');
            $table->foreign('updated_by')->references('id_pengguna')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ssd');
    }
}
