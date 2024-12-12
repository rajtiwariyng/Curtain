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
        Schema::create('quotation_items', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_id')->nullable();
            $table->string('name')->nullable();
            $table->string('item')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('qty')->nullable();
            $table->string('unit')->nullable();
            $table->string('price')->nullable();
            $table->string('discount')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotation_items');
    }
};
