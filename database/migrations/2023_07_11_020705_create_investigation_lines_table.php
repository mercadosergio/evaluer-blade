<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('investigation_lines', function (Blueprint $table) {
            $table->id();
            $table->string('line');
            $table->string('objectives');
            $table->string('subline');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->bigInteger('program_id')->unsigned();
            $table->foreign("program_id")->references("id")->on("programs");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investigation_lines');
    }
};
