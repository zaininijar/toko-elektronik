<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->string('name', 100)->nullable()->default('text');
            $table->double('price')->nullable();
            $table->bigInteger('quantity')->nullable()->default(0);
            $table->text('picture_path')->nullable();
            $table->string('spesification')->nullable()->default('text');
            $table->text('description');
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
