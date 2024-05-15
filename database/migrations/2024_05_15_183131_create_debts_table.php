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
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_type_id');
            $table->unsignedBigInteger('category_id');
            $table->dateTime('date');
            $table->string('locality', 64);
            $table->decimal('total_value', 10, 2);
            $table->enum('status', ['E', 'D', 'PM', 'PP'])
                ->comment('E->enable - D->disable - PM->pag realizado - PP->pag pendente');
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
        Schema::dropIfExists('debts');
    }
};
