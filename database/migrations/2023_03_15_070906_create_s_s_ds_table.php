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
            $table->string('created_by');
            $table->string('updated_by');
            $table->string('id_role_pengguna');
            $table->string('kategori');
            $table->string('status');
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
        Schema::dropIfExists('ssd');
    }
}
