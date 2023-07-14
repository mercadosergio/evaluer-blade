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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('program');
            $table->integer('semester');
            $table->integer('n_members');
            $table->string('period');

            $table->timestamps();

            $table->bigInteger('course_id')->unsigned();
            $table->foreign("course_id")->references("id")->on("courses");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
