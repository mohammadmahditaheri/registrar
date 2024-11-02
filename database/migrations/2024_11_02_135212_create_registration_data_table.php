<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registration_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('session_id')
                ->constrained('registration_sessions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('question_id')
                ->constrained('questions')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('external_system_status', 50)
                ->nullable();
            $table->string('external_reference_id', 100)
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registration_data');
    }
};
