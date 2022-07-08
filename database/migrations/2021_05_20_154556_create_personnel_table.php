<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personnel', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('parent_name', 255)->nullable();
            $table->date('birthday')->nullable();
            $table->string('birth_place')->nullable();
            $table->string('national_code',20)->nullable();
            $table->string('residence_city', 255)->nullable();
            $table->integer('education_level')->nullable();
            $table->string('education_field')->nullable();
            $table->string('job')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('home_number')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('email')->nullable();
            $table->string('bank_number')->nullable();
            $table->string('card_number')->nullable();
            $table->string('eshteghal')->nullable();
            $table->boolean('is_heyat_elmi')->nullable();
            $table->string('university')->nullable();
            $table->string('daraje_elmi')->nullable();
            $table->string('hoze_motaleati')->nullable();
            $table->string('nahve_ashnayi')->nullable();
            $table->string('home_address',2000)->nullable();
            $table->string('office_address',2000)->nullable();
            $table->string('office_number')->nullable();
            $table->string('hamkari')->nullable();
            $table->string('resume_link')->nullable();
            $table->string('profile_pic')->nullable();
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
        Schema::dropIfExists('personnel');
    }
}
