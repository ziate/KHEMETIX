<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('billing_cycle'); // monthly, annual
            $table->decimal('price', 10, 2);
            $table->integer('included_credits');
            $table->boolean('overage_enabled')->default(false);
            $table->decimal('overage_price_per_1k_tokens', 10, 4)->nullable();
            $table->json('model_multipliers')->nullable();
            $table->integer('max_requests_per_day')->nullable();
            $table->integer('max_tokens_per_day')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('plans');
    }
};
