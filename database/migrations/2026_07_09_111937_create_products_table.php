<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_distributor');
            $table->string('name');
            $table->bigInteger('price');
            $table->bigInteger('discount_price')->nullable();
            $table->integer('stock');
            $table->string('category');
            $table->text('description');
            $table->string('image');
            $table->boolean('is_flash_sale')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};