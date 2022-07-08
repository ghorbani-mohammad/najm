<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign_language', function (Blueprint $table) {
            $table->id();
            $table->integer('personnel_id');
            $table->string('language')->nullable();
            $table->string('reading')->nullable();
            $table->string('listening')->nullable();
            $table->string('speaking')->nullable();
            $table->string('writing')->nullable();
            $table->string('license')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('foreign_language');
    }
}
