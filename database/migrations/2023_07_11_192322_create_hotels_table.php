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
        Schema::create('hotels', function (Blueprint $table) {
            
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->string('vacancy');
            $table->string('longitude and latitude');
	        $table->foreignId('spots_id')->constrained()->cascadeOnDelete();
            $table->foreignId('districts_id')->constrained()->cascadeOnDelete();
        });   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
        
    }
};
