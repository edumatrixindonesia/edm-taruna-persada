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
        Schema::create('mapel_regencies', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('mapelId')->constrained('mapels')->cascadeOnDelete();
            $table->foreignUuid('regencyId')->constrained('regencies')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapel_regencies');
    }
};
