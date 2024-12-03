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
        Schema::create('protocol_roles', function (Blueprint $table) {
            $table->id();
            $table->uuid('protocol_id')->index();
            $table->uuid('user_id')->index();
            $table->enum('role', ['student', 'director', 'sinodal']);
            $table->json('person_data_backup')->nullable();
            $table->timestamps();

            $table->foreign('protocol_id')->references('id')->on('protocols')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocol_roles');
    }
};