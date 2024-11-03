<?php

use App\Foundation\Enums\PlansEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('registration_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_active')
                ->default(true);
            $table->timestamps();
        });

        DB::table('registration_plans')->insert([
            [
                'id' => 1,
                'name' => PlansEnum::STANDARD->value,
                'description' => config(
                    'registration.plans.' .
                    PlansEnum::STANDARD->value .
                    '.description'
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'name' => PlansEnum::SIMPLIFIED->value,
                'description' => config(
                    'registration.plans.' .
                    PlansEnum::SIMPLIFIED->value .
                    '.description'
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('registration_plans');
    }
};
