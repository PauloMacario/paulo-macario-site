<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'cheap_beer';
    
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('beer_places', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beer_id')->constrained('beers')->onDelete('cascade');
            $table->foreignId('place_id')->constrained('places')->onDelete('cascade');
            $table->decimal('price', 10, 2);
            $table->date('collected_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beer_places');
    }
};
