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
            $table->text('description');
            $table->string('fabric');
            $table->string('material');
            $table->string('measurement');
            $table->string('warranty');


            // Meta
            $table->string('meta_slug');

            // Relation
            $table->foreignId('product_category_id')->constrained('product_categories')->cascadeOnDelete();



            $table->timestamps();
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