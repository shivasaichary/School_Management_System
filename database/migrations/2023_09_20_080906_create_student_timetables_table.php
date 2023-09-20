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
        Schema::create('student_timetables', function (Blueprint $table) {
            $table->id();
            $table->string('student_code');
            $table->string('day_of_week');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('subject_name');
            $table->string('instructor' )->nullable();
            $table->string('classroom')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_timetables');
    }
};
