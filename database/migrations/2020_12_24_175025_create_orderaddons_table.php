<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderaddonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderaddons', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('orderId');
            $table->unsignedBigInteger('addonId');
            
            $table->foreign('addonId')->references('id')->on('addons')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('orderaddons');
    }
}
