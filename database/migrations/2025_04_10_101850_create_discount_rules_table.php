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
        Schema::create('discount_rules', function (Blueprint $table) {
            $table->id();
            $table->string('category')->nullable();
            $table->integer('min_qty');
            $table->integer('max_qty');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('discount_type',['Percentage','Fixed']);
            $table->decimal('discount_value',10,2);
            $table->integer('priority')->default(5);
            $table->integer('is_exclusive')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_rules');
    }
};
