<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('type', 255);
            $table->string('title', 255)->nullable();
            $table->string('title_en', 255)->nullable();
            $table->string('nobate_chap', 255)->nullable();
            $table->string('sal', 255)->nullable();
            $table->string('shomaregan', 255)->nullable();
            $table->string('shabak', 255)->nullable();
            $table->string('fipa', 255)->nullable();
            $table->string('tahrir_moallef', 255)->nullable();
            $table->string('tahrir_nazer_ali', 255)->nullable();
            $table->string('tahrir_nazer_elmi', 255)->nullable();
            $table->string('tahrir_nazer_fanni', 255)->nullable();
            $table->string('tahrir_virastar', 255)->nullable();
            $table->string('tahrir_nemoone_khan', 255)->nullable();
            $table->string('tahrir_type_safhe_arayi', 255)->nullable();
            $table->string('tahrir_tarrah_jeld', 255)->nullable();
            $table->integer('hazine_talif')->nullable();
            $table->integer('hazine_type')->nullable();
            $table->integer('hazine_safhe_arayi')->nullable();
            $table->integer('hazine_tarahi_jeld')->nullable();
            $table->integer('hazine_davaran')->nullable();
            $table->integer('hazine_nezarat_fani')->nullable();
            $table->integer('hazine_nezarat_adabi')->nullable();
            $table->integer('hazine_chap')->nullable();
            $table->integer('hazine_majmooe')->nullable();
            $table->integer('hazine_moshavere')->nullable();
            $table->integer('hazine_manabe_mostanadat')->nullable();
            $table->integer('hazine_elsagh_ghardad')->nullable();
            $table->date('enteshar_tarikhe_shoroo_hamkari')->nullable();
            $table->date('enteshar_tarikhe_etmam_hamkari')->nullable();
            $table->date('enteshar_tarikhe_ersal_be_davari')->nullable();
            $table->string('natije_davari', 1000)->nullable();
            $table->date('enteshar_tarikhe_ersal_be_virastyar')->nullable();
            $table->date('enteshar_tarikhe_daryaft_salahiat_amniati')->nullable();
            $table->date('enteshar_tarikhe_ersal_entesharat')->nullable();
            $table->date('enteshar_tarikhe_daryaft_fipa')->nullable();
            $table->date('enteshar_tarikhe_daryaft_shabak')->nullable();
            $table->date('enteshar_tarikh')->nullable();
            $table->integer('hazine_maghalat')->nullable();

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
        Schema::dropIfExists('books');
    }
}
