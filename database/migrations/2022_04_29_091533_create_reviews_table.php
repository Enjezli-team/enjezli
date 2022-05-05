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
            $table->id();
            $table->integer('rate');
            $table->string('comment');
            $table->string('type');
            $table->integer('type_id');
	        $table->foreignId('from_id');
            $table->foreign('from_id')->references('id')->on('users');
            $table->foreignId('to_id');
            $table->foreign('to_id')->references('id')->on('users');
          
           
            // $table->foreign('type_id')->references('id')->on('users');
            // $table->foreign('type_id')->references('id')->on('projects');
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
        Schema::dropIfExists('reviews');
    }
}
