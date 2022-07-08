<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMizSessionMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('miz_session_members', function (Blueprint $table) {
            $table->id();
            $table->integer('session_id');
            $table->string('name');
            $table->string('sazman_matbooe')->nullable();
            $table->string('madrak')->nullable();
            $table->string('haghozzahme')->nullable();
            $table->string('tarikh_pardakht')->nullable();
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
        Schema::dropIfExists('miz_session_members');
    }
}
