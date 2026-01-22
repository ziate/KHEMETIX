<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
    public function up(): void {
        Schema::create("projects", function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained()->onDelete("cascade");
            $table->string("name");
            $table->string("slug")->unique();
            $table->text("description")->nullable();
            $table->string("wp_version_target")->nullable();
            $table->string("php_version_target")->nullable();
            $table->string("plugin_namespace")->nullable();
            $table->text("default_system_prompt")->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists("projects"); }
};