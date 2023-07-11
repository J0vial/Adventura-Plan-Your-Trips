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
        Schema::create('plannings', function (Blueprint $table) {
            $table->id();
            $table->string('user_name_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('transportation_id')->references('id')->on('transportations')->onDelete('cascade');
            $table->string('hotels_id')->references('id')->on('hotels')->onDelete('cascade');
            $table->string('spot_id')->references('id')->on('spots')->onDelete('cascade');
            $table->string('user_review_id')->references('id')->on('user_reviews')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plannings');
    }
};
