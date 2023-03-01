<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsor_user', function (Blueprint $table) {
            // $table->foreignId('user_id')->constrained();
            // $table->foreignId('sponsor_id')->constrained();
            $table->unsignedTinyInteger('sponsor_id')->nullable();
            $table->unsignedMediumInteger('user_id')->nullable();
            $table->date('expiring_date')->nullable();

            $table->foreign('sponsor_id')->references('id')->on('sponsors');
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
        Schema::dropIfExists('sponsor_user');
    }
}
