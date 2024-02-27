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
        Schema::create('protocol', function (Blueprint $table) {
            $table->id();
            $table->foreignId('protocol_id')->constrained()->onDelete('cascade');
            $table->string('student_ID', 10)->unique()->nullable();
            $table->string('title_protocol')->nullable();
            $table->string('staff_ID', 10)->unique()->nullable();
            $table->string('keywords')->nullable();
            $table->binary('protocol_doc')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocol');
    }
};