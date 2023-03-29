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
        Schema::create('product_tags', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('tag_id');

            $table->timestamps();

            //            IDX
            $table->index('product_id', 'product_tag_product_idx');
            $table->index('tag_id', 'product_tag_tag_idx');

            //            FK
            $table->foreign('product_id', 'product_tag_product_fk')->on('products')->references('id');
            $table->foreign('tag_id', 'product_tag_tag_fk')->on('tags')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_tags');
    }
};
