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
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_return_id')->constrained('product_returns')->onDelete('cascade');  // ربط مع جدول الإرجاع
            $table->decimal('amount', 10, 2);  // المبلغ المسترد
            $table->string('payment_method');  // طريقة الدفع (مثل بطاقة الائتمان، باي بال)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('refunds');
    }
};
