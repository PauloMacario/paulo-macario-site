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
        Schema::create('debt_scheduling', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_type_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('launch_day');
            $table->date('date_start');
            $table->date('date_end');
            $table->string('locality', 64);
            $table->decimal('value', 10, 2);
            $table->dateTime('last_run');
            $table->enum('status', ['E', 'D'])
                ->comment('E->enable - D->disable');
            $table->timestamps();
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debt_scheduling');
    }
};
