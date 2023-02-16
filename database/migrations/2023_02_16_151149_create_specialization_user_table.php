<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecializationUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialization_user', function (Blueprint $table) {
            // $table->foreignId('user_id')->constrained();
            // $table->foreignId('specialization_id')->constrained();
            $table->unsignedSmallInteger('specialization_id');
            $table->unsignedMediumInteger('user_id');

            $table->foreign('specialization_id')->references('id')->on('specializations');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('specialization_user');
    }
}
