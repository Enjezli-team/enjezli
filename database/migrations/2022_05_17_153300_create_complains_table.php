<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {
            $table->id();
            $table->text('seeker_reason');
            $table->text('provider_complain')->nullable();
            $table->foreignId('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->integer('is_solved')->default(0);
            $table->text('solution')->nullable();
            $table->date('solution_date')->nullable();
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
        Schema::dropIfExists('complains');
    }
}
