
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
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('orders_id');
            $table->unsignedBigInteger('reservations_id');
            $table->foreign('reservations_id')->references('reservations_id')->on('reservations');
            $table->unsignedBigInteger('bills_id');
            $table->foreign('bills_id')->references('bills_id')->on('bills');
            $table->boolean('IsActive');
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
        Schema::dropIfExists('orders');
    }
};
