<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaghaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maghale', function (Blueprint $table) {
            $table->id();
            $table->integer('publication_id');
            $table->string('title', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->string('authors', 255)->nullable();
            $table->string('davar', 255)->nullable();
            $table->string('haznie_talif', 255)->nullable();
            $table->string('haznie_davari', 255)->nullable();
            $table->string('haznie_virast', 255)->nullable();
            $table->string('haznie_tarjome', 255)->nullable();
            $table->date('tarikh_pardakht')->nullable();

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
        Schema::dropIfExists('maghale');
    }
}
