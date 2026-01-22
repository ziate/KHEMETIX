<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("credit_transactions", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->string("type"); // grant, deduct, manual_adjust, purchase, refund
            $table->integer("amount");
            $table->string("reason")->nullable();
            $table->string("ref_type")->nullable();
            $table->unsignedBigInteger("ref_id")->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists("credit_transactions"); }
};