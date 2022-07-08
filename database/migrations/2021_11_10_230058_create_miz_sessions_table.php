<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMizSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miz_sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('language_id');
            $table->string('shomare')->nullable();
            $table->string('tarikh')->nullable();
            $table->string('mozoo')->nullable();
            $table->string('raees_miz')->nullable();
            $table->string('dabir_miz')->nullable();
            $table->string('aza_miz')->nullable();
            $table->string('tarikh_gozaresh_be_masool')->nullable();
            $table->string('tarikh_enteshar')->nullable();
            $table->string('hazine_aza')->nullable();
            $table->integer('duration')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('miz_sessions');
    }
}
