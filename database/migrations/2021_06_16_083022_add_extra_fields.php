<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExtraFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personnel', function (Blueprint $table) {
            $table->bigInteger('daryafti')->nullable();
            $table->bigInteger('makhaz')->nullable();
            $table->string('shomare_personel')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personnel', function (Blueprint $table) {
            $table->dropColumn('daryafti');
            $table->dropColumn('makhaz');
            $table->dropColumn('shomare_personel');
        });
    }
}
