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
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('parent_name');
            $table->unsignedInteger('age');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->timestamps();

            $table->foreignId('user_id')->nullable()->constrained();

            // $table->foreignId('student_id')->constrained('students');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parents');
    }
};
