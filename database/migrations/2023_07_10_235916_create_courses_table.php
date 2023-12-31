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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('description', 700);
            $table->integer('semester');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->bigInteger('program_id')->unsigned();
            $table->foreign("program_id")->references("id")->on("programs");

            $table->bigInteger('advisor_id')->unsigned();
            $table->foreign("advisor_id")->references("id")->on("advisors");

            $table->bigInteger('period_id')->unsigned();
            $table->foreign("period_id")->references("id")->on("periods");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
