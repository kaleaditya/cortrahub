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
        Schema::create('role_infos', function (Blueprint $table) {
            $table->id();
            $table->string('role_id');
            $table->boolean('image')->default(0);
            $table->boolean('meta_title')->default(0);
            $table->boolean('meta_kewords')->default(0);
            $table->boolean('meta_description')->default(0);
            $table->boolean('short_order')->default(0);
            $table->boolean('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_infos');
    }
};
