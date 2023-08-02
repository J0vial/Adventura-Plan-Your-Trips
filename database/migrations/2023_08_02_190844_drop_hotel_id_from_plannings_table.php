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
        Schema::table('plannings', function (Blueprint $table) {
            $table->dropConstrainedForeignId('hotels_id');
            $table->string('hotel_info');
            $table->string('return_trans');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plannings', function (Blueprint $table) {
            //
        });
    }
};