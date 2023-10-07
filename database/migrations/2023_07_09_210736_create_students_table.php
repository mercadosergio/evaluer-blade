<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('names');
            $table->string('first_lastname');
            $table->string('second_lastname');
            $table->string('dni');
            $table->string('semester');
            $table->year('entered_at');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign("user_id")->references("id")->on("users");
            $table->bigInteger('program_id')->unsigned();
            $table->foreign("program_id")->references("id")->on("programs");
            $table->timestamps();
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
