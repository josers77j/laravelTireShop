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
        Schema::create('product_sale_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->nullable()->constrained();
            $table->foreignId('product_id')->nullable()->constrained();
            $table->integer('quantity');
            $table->decimal('sale_price', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_sale_details');
    }
};
