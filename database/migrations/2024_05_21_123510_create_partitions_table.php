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
        Schema::create('partitions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('shopper_id');

            $table->unsignedBigInteger('installment_id');

            $table->decimal('value', 10, 2);

            $table->enum('status', ['E', 'D'])
                ->comment('E->enable - D->disable');

            $table->timestamps();
            
            $table->foreign('shopper_id')->references('id')->on('shoppers');

            $table->foreign('installment_id')->references('id')->on('installments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partitions');
    }
};
