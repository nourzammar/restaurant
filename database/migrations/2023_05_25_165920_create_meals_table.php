<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->bigIncrements('meal_id');
            $table->string('name');
            $table->string('price');
            $table->string('type');
            $table->binary('photo')->nullable();

            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('meals');
    }
};
