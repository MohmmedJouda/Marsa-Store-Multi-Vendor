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
        Schema::create('feed_backs', function (Blueprint $table) {

            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // ربط مع الطلب
            $table->text('message');
            $table->enum('status', allowed: ['cancelled', 'refunded', 'delivered']); // حالة الطلب
            $table->text('admin_response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_backs');
    }
};
