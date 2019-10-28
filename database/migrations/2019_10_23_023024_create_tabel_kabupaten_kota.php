<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelKabupatenKota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_kabupaten_kota', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 50);
			$table->unsignedInteger('id_provinsi');
			 });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_kabupaten_kota');
    }
}
