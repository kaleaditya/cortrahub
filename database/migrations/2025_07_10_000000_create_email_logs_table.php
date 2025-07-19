<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->unsignedBigInteger('trainer_id')->nullable();
            $table->string('to_email');
            $table->string('subject');
            $table->text('body')->nullable();
            $table->string('pdf_name')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('email_logs');
    }
}; 