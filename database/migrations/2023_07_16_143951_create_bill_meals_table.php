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
        Schema::create('bill_meals', function (Blueprint $table) {
            $table->bigIncrements('BillMeal_id');
            $table->unsignedBigInteger('meal_id');
            $table->foreign('meal_id')->references('meal_id')->on('meals');
            $table->unsignedBigInteger('bills_id');
            $table->foreign('bills_id')->references('bills_id')->on('bills');
            $table->string('quantity');
            $table->string('price');
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
        Schema::dropIfExists('bill_meals');
    }
};
