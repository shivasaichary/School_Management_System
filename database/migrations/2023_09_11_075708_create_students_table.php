<?php

use App\Models\Cls;
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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('student_code');
            $table->unsignedInteger('age');
            $table->string('gender');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->timestamps();

            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignIdFor(Cls::class)->nullable()->constrained()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
