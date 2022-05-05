<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            //$table->string('name');
            $table->string('phone');
            $table->string('gander');
 	        $table->date('birth_date');
            $table->string('country');
            $table->string('facebook')->nullable();
            $table->string('github')->nullable();
            $table->string('tweeter')->nullable();
            $table->text('major')->nullable();
            $table->text('Job_title')->nullable();
            $table->text('description');
           $table->integer('status')->default(1);
            $table->foreignId('user_id')->unique();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('profiles');
    }
}
