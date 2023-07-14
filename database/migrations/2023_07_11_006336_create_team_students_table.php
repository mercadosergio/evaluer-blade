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
        Schema::create('students_teams', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('student_id')->unsigned();
            $table->foreign("student_id")->references("id")->on("students");
            $table->string('full_name');

            $table->bigInteger('team_id')->unsigned();
            $table->foreign("team_id")->references("id")->on("teams");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_students');
    }
};
