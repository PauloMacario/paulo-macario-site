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
        Schema::create('shoppers', function (Blueprint $table) {
            $table->id();

            $table->string('name', 48);
            
            $table->longText('style')
                ->nullable();

            $table->enum('status', ['E', 'D'])
                ->comment('E->enable - D->disable');
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shoppers');
    }
};
