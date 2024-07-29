<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dine_outs', function (Blueprint $table) {
            $table->bigIncrements('DineOut_id');
            $table->unsignedBigInteger('bills_id');
            $table->foreign('bills_id')->references('bills_id')->on('bills');
            $table->string('order_time');
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
        Schema::dropIfExists('dine_outs');
    }
};
