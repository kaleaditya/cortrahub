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
        Schema::create('program_enquiries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->string('selected_category');
            $table->date('date');
            $table->string('location');
            $table->integer('duration');
            $table->time('start_time');
            $table->integer('attendees');
            $table->decimal('budget', 10, 2)->nullable();
            $table->text('program_brief');
            $table->string('pdf_path')->nullable();
            $table->json('selected_trainers');
            $table->enum('status', ['pending', 'sent_to_trainers', 'completed'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_enquiries');
    }
};
