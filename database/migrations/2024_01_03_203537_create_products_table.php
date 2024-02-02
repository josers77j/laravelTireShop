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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('purchase_price', 8, 2);
            $table->decimal('sale_price', 8, 2);
            $table->foreignId('category_id')->nullable()->constrained();
            $table->integer('quantity');
            $table->text('description')->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->date('acquisition_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
