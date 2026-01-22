<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("ai_usage_logs", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->string("model_id");
            $table->foreignId("conversation_id")->nullable()->constrained()->onDelete("set null");
            $table->string("request_id")->nullable();
            $table->integer("prompt_tokens_est");
            $table->integer("completion_tokens_est");
            $table->integer("total_tokens_est");
            $table->integer("credits_charged");
            $table->integer("latency_ms")->nullable();
            $table->string("status");
            $table->text("error_message")->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists("ai_usage_logs"); }
};