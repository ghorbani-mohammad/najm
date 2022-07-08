<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication', function (Blueprint $table) {
            $table->id();
            $table->string('type', 255)->nullable();
            $table->integer('hazine_maghalat')->nullable();
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
            $table->string('heyat_sardabir')->nullable();
            $table->string('heyat_modir_masool')->nullable();
            $table->string('heyat_nazer_ali')->nullable();
            $table->string('heyat_nazer_elmi')->nullable();
            $table->string('heyat_nazer_fani')->nullable();
            $table->string('heyat_modir_ejrayi')->nullable();
            $table->string('heyat_tarrahe_jeld')->nullable();
            $table->string('heyat_virastar_elmi')->nullable();
            $table->string('heyat_virastar_adabi')->nullable();
            $table->string('heyat_nemoone_khan')->nullable();
            $table->integer('shomare')->nullable();
            $table->integer('sal')->nullable();
            $table->integer('fasl')->nullable();
            $table->timestamp('tarikhe_enteshar')->nullable();
            $table->integer('shomare_mosalsal')->nullable();
            $table->integer('shomaregan')->nullable();
            $table->string('title')->nullable();
            $table->string('title_en')->nullable();
            $table->string('authors')->nullable();
            $table->string('keshvar')->nullable();
            $table->string('moassese_montasher_konande')->nullable();
            $table->string('tahie_konande')->nullable();

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
        Schema::dropIfExists('publication');
    }
}
