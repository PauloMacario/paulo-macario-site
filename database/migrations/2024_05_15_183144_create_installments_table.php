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
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('debt_id');            
            $table->integer('installment_number');
            $table->date('due_date');
            $table->decimal('value', 10, 2);
            $table->enum('status', ['E', 'D', 'PM', 'PP'])
                ->comment('E->enable - D->disable - PM->pag realizado - PP->pag pendente');
            $table->timestamps();
            $table->foreign('debt_id')->references('id')->on('debts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
