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
        Schema::create('master_teachers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('theme');
            $table->string('name');
            $table->string('mapel');
            $table->string('program');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_teachers');
    }
};
