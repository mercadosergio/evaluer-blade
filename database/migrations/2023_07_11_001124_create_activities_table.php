<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description', 700);
            $table->integer('status');
            $table->string('available_from');
            $table->string('available_until');
            $table->bigInteger('type_id')->unsigned();
            $table->foreign("type_id")->references("id")->on("activity_types");

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->bigInteger('course_id')->unsigned();
            $table->foreign("course_id")->references("id")->on("courses");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
