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
        Schema::create('usersreviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id')->constrained()->cascadeOnDelete();
            $table->string('destination_review');
            $table->string('transportation_review');
            $table->string('accomodation');
            $table->foreignId('hotels_id')->constrained()->cascadeOnDelete();
            $table->foreignId('districts_id')->constrained()->cascadeOnDelete();
            $table->foreignId('spots_id')->constrained()->cascadeOnDelete();//////
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usersreviews');
    }
};