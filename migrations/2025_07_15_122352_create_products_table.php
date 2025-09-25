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
        $table->decimal('price', 10, 2);
        $table->decimal('discount', 5, 2)->nullable()->default(0);
        $table->unsignedInteger('stock')->default(0);
        $table->enum('status', ['active', 'inactive'])->default('active');
        $table->boolean('is_featured')->default(false);
        $table->softDeletes();
        $table->timestamps();

        $table->unsignedBigInteger('subcategory_id')->nullable();
        $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');

        $table->unsignedBigInteger('store_id')->nullable();
        $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');

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


