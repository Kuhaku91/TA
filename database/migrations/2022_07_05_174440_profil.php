<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profil extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profil_siswas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('wali')->default('0');
            $table->string('kelas_id')->default('0');
            $table->string('nisn')->default('0');
            $table->string('no_hp')->nullable();
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan'])->nullable();
            $table->string('ttl')->nullable();
            $table->text('alamat')->nullable();
            $table->text('lulusan')->nullable();
            $table->string('agama')->nullable();
            $table->string('ayah')->nullable();
            $table->string('ibu')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
        Schema::create('profil_walis', function (Blueprint $table) {
            $table->id();
            $table->text('alamat')->nullable();
            $table->timestamps();
        });
        Schema::create('profil_gurus', function (Blueprint $table) {
            $table->id();
            $table->string('no_hp')->nullable();
            $table->string('ttl')->nullable();
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan'])->nullable();
            $table->text('alamat')->nullable();
            $table->text('latar')->nullable();
            $table->timestamps();
        });
        Schema::create('profil_bks', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan'])->nullable();
            $table->string('no_hp')->nullable();
            $table->string('ttl')->nullable();
            $table->text('alamat')->nullable();
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
        Schema::dropIfExists('profil_siswas');
        Schema::dropIfExists('profil_walis');
        Schema::dropIfExists('profil_gurus');
        Schema::dropIfExists('profil_bks');
    }
}
