<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBukti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lapors', function (Blueprint $table) {
            $table->string('bukti1')->after('bukti')->nullable();
            $table->string('bukti2')->after('bukti1')->nullable();
            $table->string('bukti3')->after('bukti2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lapors', function($table) {
            $table->dropColumn('bukti1');
            $table->dropColumn('bukti2');
            $table->dropColumn('bukti3');
        });
    }
}
