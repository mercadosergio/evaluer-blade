<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('periods', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->enum('term', [1, 2]);
            $table->bigInteger('start_at');
            $table->bigInteger('end_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('periods');
    }
};
