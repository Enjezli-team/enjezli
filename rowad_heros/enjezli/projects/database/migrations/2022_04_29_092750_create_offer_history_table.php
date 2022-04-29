<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_history', function (Blueprint $table) {
            $table->id();
            $table->text('comment')->nullable();
            $table->integer('type');//accept ,reject , cancel
 	        $table->foreignId('user_id');
            $table->foreign('user_id')->references('id')->on('users');
 	        $table->foreignId('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers');
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
        Schema::dropIfExists('offer_history');
    }
}
