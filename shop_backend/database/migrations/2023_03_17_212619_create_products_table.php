

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->string('preview_image')->nullable(); 
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('price_old')->nullable();
            $table->integer('count')->nullable();
            $table->boolean('is_published')->default(true);            
            $table->softDeletes();
            $table->timestamps();
                       
            $table->index('category_id', 'product_category_idx');
            $table->foreign('category_id', 'product_category_fk')->on('categories')->references('id');

            $table->index('group_id', 'product_group_idx');
            $table->foreign('group_id', 'product_group_fk')->on('groups')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};