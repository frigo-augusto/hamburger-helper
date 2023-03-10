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
        Schema::create('items_ingredients', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('item_id')->unsigned();
            $table->bigInteger('ingredient_id')->unsigned();
            $table->integer('amount');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('ingredient_id')->references( 'id')->on('ingredients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items_ingredients');
    }
};
