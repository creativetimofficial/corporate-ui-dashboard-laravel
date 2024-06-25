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
            $table->id(); // Primary key
            $table->string('name'); // Item name
            $table->integer('quantity'); // Quantity
            $table->decimal('price', 8, 2); // Price with precision and scale
            $table->unsignedBigInteger('supplier_id')->nullable()->default(null); // Supplier ID (FK)
            $table->text('description')->nullable(); // Description, can be nullable
            $table->timestamps(); // Created at and Updated at columns


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
