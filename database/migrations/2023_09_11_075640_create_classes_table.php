<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\School;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cls', function (Blueprint $table) {
            $table->id();
            $table->string('class_name')->nullable();
            $table->string('section')->nullable();
            $table->string('subject')->nullable();
            $table->time('starting_time')->nullable();
            $table->time('ending_time')->nullable();
            $table->string('teacher_name')->nullable();
            $table->timestamps();

            $table->foreignIdFor(School::class)->nullable()->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cls');
    }
};
