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
    Schema::create('stores', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('slug')->unique();
        $table->text('description')->nullable();
        $table->text('slogan')->nullable();
        $table->string('logo')->nullable();
        $table->string('phone')->nullable();
        $table->string('address')->nullable();
        $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        $table->timestamps();
        $table->softDeletes();

        // الربط بـ user_id
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
        Schema::table('stores', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
