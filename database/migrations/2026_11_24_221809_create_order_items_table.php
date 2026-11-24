<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            // товар могут удалить — позиция заказа при этом сохраняется
            $table->foreignId('product_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');            // снимок названия на момент заказа
            $table->decimal('price', 10, 2);   // снимок цены на момент заказа
            $table->unsignedInteger('qty');
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
