<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foodorders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('orderId');
            $table->unsignedBigInteger('foodId');
            $table->unsignedInteger('qte');

            $table->foreign('foodId')->references('id')->on('food')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('orderId')->references('id')->on('orders')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foodorders');
    }
}
