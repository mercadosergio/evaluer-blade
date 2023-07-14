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
        Schema::create('propositions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('line');
            $table->string('advisor');
            $table->string('leader');
            $table->string('program');
            $table->integer('semester');
            $table->integer('status');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->bigInteger('team_id')->unsigned();
            $table->foreign("team_id")->references("id")->on("teams");

            $table->bigInteger('activity_id')->unsigned();
            $table->foreign("activity_id")->references("id")->on("activities");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propositions');
    }
};
