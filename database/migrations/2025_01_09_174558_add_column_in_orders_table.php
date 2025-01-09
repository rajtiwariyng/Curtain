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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('payment_mode')->after('quotation_id')->nullable();
            $table->string('payment_mode_by')->after('payment_mode')->nullable();
            $table->string('paid_amount')->after('payment_mode_by')->nullable();
            $table->string('payment_type')->after('paid_amount')->nullable();
            $table->string('remarks')->after('payment_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
