<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("subscriptions", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->foreignId("plan_id")->constrained()->onDelete("cascade");
            $table->string("status");
            $table->timestamp("start_date")->nullable();
            $table->timestamp("end_date")->nullable();
            $table->timestamp("renew_at")->nullable();
            $table->integer("credits_granted")->default(0);
            $table->integer("credits_remaining")->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists("subscriptions"); }
};