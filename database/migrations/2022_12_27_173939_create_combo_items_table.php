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
        Schema::create('combos_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('combo_id')->unsigned();
            $table->bigInteger('item_id')->unsigned();
            $table->integer('amount')->nullable();
            $table->foreign('combo_id')->references('id')->on('combos')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combos_items');
    }
};
