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
        Schema::table('arts', function (Blueprint $table) {
            $table->boolean('featured')->default(false);
            $table->string('features');
        });
        Schema::table('artists', function (Blueprint $table) {
            $table->boolean('featured')->default(false);
        });
        Schema::table('events', function (Blueprint $table) {
            $table->boolean('featured')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('add_fields_to_arts_artists_events');
    }
};
