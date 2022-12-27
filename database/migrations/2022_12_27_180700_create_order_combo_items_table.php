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
        Schema::create('order_combo_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('item_combo_id')->unsigned();
            $table->string('type');
            $table->integer('amount');
            $table->foreign('order_id')->references('id')->on('orders');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_combo_items');
    }
};
