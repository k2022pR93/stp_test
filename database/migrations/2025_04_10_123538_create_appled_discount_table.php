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
        Schema::create('appled_discount', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->integer('qty');
            $table->date('purchase_date');
            $table->decimal('total_bill_amount',10,2);
            $table->integer('matched_rules');
            $table->string('exclusive_rules')->nullable();
            $table->decimal('discount_applied',10,2);
            $table->decimal('final_amount',10,2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appled_discount');
    }
};
