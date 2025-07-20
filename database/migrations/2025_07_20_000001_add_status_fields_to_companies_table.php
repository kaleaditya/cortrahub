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
        Schema::table('companies', function (Blueprint $table) {
            if (!Schema::hasColumn('companies', 'status')) {
                $table->enum('status', ['pending', 'sent'])->default('pending')->after('website');
            }
            if (!Schema::hasColumn('companies', 'username')) {
                $table->string('username')->nullable()->after('status');
            }
            if (!Schema::hasColumn('companies', 'show_password')) {
                $table->string('show_password')->nullable()->after('username');
            }
            if (!Schema::hasColumn('companies', 'email_sent_at')) {
                $table->timestamp('email_sent_at')->nullable()->after('show_password');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn(['status', 'username', 'show_password', 'email_sent_at']);
        });
    }
}; 