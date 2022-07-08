<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('type', 255);
            $table->string('name', 255)->nullable();
            $table->string('mojri', 255)->nullable();
            $table->string('rahnama', 255)->nullable();
            $table->string('moshaver', 255)->nullable();
            $table->string('mizan_kasri', 255)->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->date('tarikh_ghardad')->nullable();
            $table->string('gharardad_link')->nullable();
            $table->string('tarikh_bahrebardari')->nullable();
            $table->string('hoze_karbord')->nullable();
            $table->string('ghesmat_bahrebar')->nullable();

            $table->integer('hazine_nazer_1')->nullable();
            $table->integer('hazine_nazer_2')->nullable();
            $table->integer('hazine_nazer_3')->nullable();
            $table->integer('hazine_davar_1')->nullable();
            $table->integer('hazine_davar_2')->nullable();
            $table->integer('hazine_davar_3')->nullable();
            $table->integer('hazine_moshaver')->nullable();
            $table->integer('hazine_kol_gharardad')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
