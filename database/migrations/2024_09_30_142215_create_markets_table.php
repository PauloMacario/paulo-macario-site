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
        Schema::connection('routine_tasks')
            ->create('markets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64);
            $table->string('color', 7);
            $table->string('img_name', 64)
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('routine_tasks')
            ->dropIfExists('markets');
    }
};
