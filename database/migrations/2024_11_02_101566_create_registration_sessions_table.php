<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('registration_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plan_id')
                ->constrained('registration_plans')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('current_state', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('registration_sessions');
    }
};
