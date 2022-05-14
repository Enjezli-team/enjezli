<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('file')->nullable();
            $table->text('duration');
            $table->double('price');
            $table->double('net_price');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
 	        $table->date('delivery_date')->nullable();
            $table->integer('status')->default(0);
            $table->integer('blockByAdmin')->default(0);
            $table->foreignId('handled_by')->nullable();
            $table->foreign('handled_by')->references('id')->on('users')->onDelete('cascade');
	        $table->foreignId('user_id');
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
        Schema::dropIfExists('projects');
    }
}
