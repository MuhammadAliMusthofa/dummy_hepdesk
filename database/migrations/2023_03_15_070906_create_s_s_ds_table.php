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
            $table->integer('id_kategori');
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
        Schema::dropIfExists('s_s_ds');
    }
}
