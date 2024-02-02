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
        Schema::create('tires', function (Blueprint $table) {
            $table->id();

            $table->string('profile');
            $table->string('width');
            $table->string('rim_diameter');

            $table->text('description')->nullable();

            $table->integer('quantity');
            $table->decimal('purchase_price', 8, 2);
            $table->decimal('sale_price', 8, 2);

            $table->date('acquisition_date');

            $table->foreignId('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict');
            $table->foreignId('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('status')->default('Nuevo');
            
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tires');
    }
};
