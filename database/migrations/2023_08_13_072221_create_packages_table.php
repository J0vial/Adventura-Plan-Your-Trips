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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spots_id')->constrained()->cascadeOnDelete();
            $table->foreignId('hotels_id')->constrained()->cascadeOnDelete();
            $table->foreignId('transportations_id')->constrained()->cascadeOnDelete();
            $table->string('staying');
            $table->string('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
