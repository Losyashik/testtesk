<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('external_code', length: 25)->unique();
            $table->string('name');
            $table->text('description');
            $table->decimal('price');
            $table->decimal('discount');
            $table->timestamps();
        });
        Schema::create('product_additions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('size');
            $table->string('color');
            $table->string('brand');
            $table->string('structure');
            $table->integer('qty_in_package')->nullable();
            $table->text('link_package');
            $table->string('seo_title');
            $table->string('seo_h1')->nullable();
            $table->text('seo_description');
            $table->integer('weight_product');
            $table->integer('width_product');
            $table->integer('height_product');
            $table->integer('length_product');
            $table->integer('weight_package');
            $table->integer('width_package');
            $table->integer('height_package');
            $table->integer('length_package');
            $table->string('category');
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->text('link');
            $table->text('path');
            $table->timestamps();
            
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('products_addition');
        Schema::dropIfExists('products_image');
    }
};
