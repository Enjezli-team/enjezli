<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->integer('is_read')->default(0);
 	        $table->string('type');
            $table->integer('type_id');
            // $table->foreign('type_id');
            // $table->foreign('type_id')->references('id')->on('users');
            // $table->foreign('type_id')->references('id')->on('projects');
   	        $table->foreignId('sender_id');
            $table->foreign('sender_id')->references('id')->on('users');
            $table->foreignId('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('users');
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
        Schema::dropIfExists('chats');
    }
}
