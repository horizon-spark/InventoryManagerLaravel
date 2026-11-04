<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('sku', 64)->unique(); // аналог UniqueEntity(fields: ['sku'])
            $table->decimal('price', 10, 2);      // DECIMAL(10,2) как в Doctrine
            $table->boolean('is_archived')->default(false);
            $table->timestamps();

            // Внешний ключ на categories (ManyToOne, not null)
            $table->foreignId('category_id')
                  ->constrained('categories')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};