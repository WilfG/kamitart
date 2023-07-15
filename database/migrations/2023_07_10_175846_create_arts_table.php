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
        Schema::create('arts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->boolean('status');
            $table->float('sale_price')->nullable();
            $table->string('artPath');
            $table->index('artist_id');
            $table->foreignId('artist_id')->references('id')->on('artists')->onDelete('cascade');
            $table->index('categorie_id');
            $table->foreignId('categorie_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arts');
    }
};
