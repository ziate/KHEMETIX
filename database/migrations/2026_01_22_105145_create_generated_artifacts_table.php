<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("generated_artifacts", function (Blueprint $table) {
            $table->id();
            $table->foreignId("conversation_id")->constrained()->onDelete("cascade");
            $table->string("name");
            $table->json("files"); // [{path, content}]
            $table->text("notes")->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists("generated_artifacts"); }
};