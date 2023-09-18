<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\City;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     *
     */
    public function up():void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->foreignId('principal_id')->references('id')->on('users');
            $table->foreignIdFor(City::class)->constrained();
            $table->string('principal_name');
            $table->string('school_name');
            $table->text('address');
            $table->string('school_code')->unique();

            // $table->unsignedBigInteger('yoe');
            // $table->year('yoe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     *
     */
    public function down():void
    {
        Schema::dropIfExists('schools');
    }
};
