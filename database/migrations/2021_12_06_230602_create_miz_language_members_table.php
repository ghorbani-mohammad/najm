<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMizLanguageMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miz_language_members', function (Blueprint $table) {
            $table->id();
            $table->integer('language_id');
            $table->string('name');
            $table->string('sazman_matbooe')->nullable();
            $table->string('madrak')->nullable();
            $table->string('role')->nullable();
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
        Schema::dropIfExists('miz_language_members');
    }
}
