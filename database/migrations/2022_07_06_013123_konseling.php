<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Konseling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konselings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_siswa');
            $table->bigInteger('id_guru');
            $table->string('jenis_konseling');
            $table->text('ket');
            $table->enum('verif',['b','s'])->default('b');
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
        Schema::dropIfExists('konselings');
    }
}
