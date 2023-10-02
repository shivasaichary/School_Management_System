<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->string('student_code');
            $table->string('student_name');
            $table->string('subject_code');
            $table->string('subject_name');
            $table->integer('marks_obtained');
            $table->date('date_of_exam');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('results');
    }
};
