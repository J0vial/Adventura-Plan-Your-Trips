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
        Schema::table('usersreviews', function (Blueprint $table) {
            $table->timestamps();//
            $table->dropColumn('accomodation');
            $table->dropConstrainedForeignId('districts_id');
            $table->dropColumn('transportation_review');
            $table->string('hotel_review');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usersreviews', function (Blueprint $table) {
            //
        });
    }
};
