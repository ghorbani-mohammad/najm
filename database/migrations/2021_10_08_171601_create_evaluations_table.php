<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->integer('publication_id')->nullable();    //todo: morph to
            $table->integer('session_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->string('marjae', 255)->nullable();
            $table->integer('bazkhord_mohtavayi')->nullable();
            $table->integer('bazkhord_shekli')->nullable();
            $table->integer('bazkhord_tasir_gozari')->nullable();
            $table->integer('bazkhord_karbordi')->nullable();
            $table->string('natije', 1500)->nullable();
            $table->string('link')->nullable();
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
        Schema::dropIfExists('evaluations');
    }
}
