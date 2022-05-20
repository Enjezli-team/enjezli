<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatProblemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_problems', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->integer('is_read')->default(0);
 	        $table->string('type');
            $table->integer('type_id');
            $table->integer('receiver_id1');
            $table->integer('receiver_id2');
            $table->integer('sender_id');
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
        Schema::dropIfExists('chat_problems');
    }
}
