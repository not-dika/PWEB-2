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
            $table->string('name'); 
            $table->string('slug')->unique(); 
            $table->text('description')->nullable(); 
            $table->string('sku')->unique();
            $table->unsignedBigInteger('product_category_id')->nullable();
            $table->foreign('product_category_id')
                  ->references('id')->on('product_categories')
                  ->onUpdate('cascade')
                  ->onDelete('set null');
            $table->string('image_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
