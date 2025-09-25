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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->constrained(); // حسب سياستك: cascade أو restrict
            $table->string('name')->nullable();
            $table->unsignedInteger('qty')->default(1);
            $table->decimal('price', 10, 2); // لقطة السعر وقت الإضافة
            $table->json('options')->nullable(); // للألوان/الأحجام إلخ
            $table->timestamps();

            $table->unique(['cart_id', 'product_id']); // منتج واحد بس لكل كارت
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
