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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('plan_id')->constrained('registration_plans')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            // it can be extracted to its dedicated table and referenced here
            $table->string('step');
            $table->string('question', 512);
            $table->enum('answer_format', [
                'text',
                'number',
                'boolean',
                'file'
            ])->default('text');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
