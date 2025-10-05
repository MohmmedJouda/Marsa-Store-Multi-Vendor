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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->id();
            $table->enum('payment_method', ['pay_on_delivery','credit_card','bank_transfer'])->default('pay_on_delivery');
            $table->string('bank_reference')->nullable();       // المرجع الذي أعطيته للعميل أو المعرف الذي أدخله هو
            $table->string('transaction_id')->nullable();       // رقم التحويل من البنك (يدخله العميل)
            $table->string('receipt_path')->nullable();         // مسار الملف المرفوع (أيصال)
            $table->timestamp('payment_confirmed_at')->nullable();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
