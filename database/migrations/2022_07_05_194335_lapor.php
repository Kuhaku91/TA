<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lapor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lapors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_pelapor');
            $table->bigInteger('id_dilapor');
            $table->bigInteger('id_point');
            $table->text('ket');
            $table->string('bukti');
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
        Schema::dropIfExists('lapors');
    }
}
