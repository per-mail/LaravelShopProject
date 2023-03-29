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
        Schema::create('product_colors', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('color_id');

            $table->timestamps();

            //            IDX
            $table->index('product_id', 'product_color_product_idx');
            $table->index('color_id', 'product_color_color_idx');

            //            FK
            $table->foreign('product_id', 'product_color_product_fk')->on('products')->references('id');
            $table->foreign('color_id', 'product_color_color_fk')->on('colors')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_colors');
    }
};
