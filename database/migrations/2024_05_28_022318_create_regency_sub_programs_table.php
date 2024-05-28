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
        Schema::create('regency_sub_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('subProgramId')->constrained('sub_programs')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('regencyId')->constrained('regencies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regency_sub_programs');
    }
};
