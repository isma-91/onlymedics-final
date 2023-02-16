<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // sta per $table->bigIncrements('id') cioe' UNSIGNED BIG INTEGER
            $table->unsignedMediumInteger('user_id')->nullable();
            $table->text('text');
            $table->unsignedTinyInteger('vote')->index();
            $table->string('guest_name', 20); // forse ci va l'index
            $table->string('guest_last_name', 20);
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
