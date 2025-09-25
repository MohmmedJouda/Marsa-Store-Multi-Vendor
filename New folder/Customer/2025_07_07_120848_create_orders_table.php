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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // العميل
            $table->foreignId('store_id')->constrained()->onDelete('cascade'); // المتجر المرتبط بالطلب
            $table->decimal('total_price', 10, 2);
            $table->string('shipping_address');
            $table->enum('status', ['pending', 'confirmed', 'shipped', 'delivered', 'canceled'])->default('pending');
            $table->enum('payment_method', ['cod', 'gateway'])->default('cod');
            $table->enum('payment_status', ['unpaid', 'paid'])->default('unpaid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
