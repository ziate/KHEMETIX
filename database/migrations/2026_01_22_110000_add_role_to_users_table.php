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
        Schema::table('users', function (Blueprint $table) {
            // role: admin | user
            if (!Schema::hasColumn('users', 'role')) {
                $table
                    ->string('role', 20)
                    ->default('user')
                    ->after('password')
                    ->comment('user | admin');
            }
        });

        // تأمين: أي مستخدم موجود بدون role نعتبره user
        \DB::table('users')
            ->whereNull('role')
            ->update(['role' => 'user']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'role')) {
                $table->dropColumn('role');
            }
        });
    }
};
