<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->double('price');
            $table->double('net_price');
            $table->text('duration');
            $table->text('description')->nullable();
            $table->integer('status')->default(1);
            $table->foreignId('provider_id');
            $table->foreign('provider_id')->references('id')->on('users');
 	        $table->foreignId('project_id');
            $table->foreign('project_id')->references('id')->on('projects');
           

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
        Schema::dropIfExists('offers');
    }
}
