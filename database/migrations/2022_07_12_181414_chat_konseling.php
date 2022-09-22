<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChatKonseling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_konselings', function (Blueprint $table) {
            $table->bigInteger('id_konseling');
            $table->bigInteger('id_pengirim');
            $table->bigInteger('id_penerima');
            $table->text('chat');
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
        Schema::dropIfExists('chat_konselings');
    }
}
