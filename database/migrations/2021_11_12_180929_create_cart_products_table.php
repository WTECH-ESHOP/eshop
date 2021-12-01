<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProductsTable extends Migration {

    public function up() {
        Schema::create('cart_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            $table->unsignedInteger('amount')->default(1);
            $table->foreignId('quantity_id')->constrained('quantities')->cascadeOnDelete();
            $table->timestamps();
            $table->unique(['user_id', 'quantity_id']);
        });
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('cart_products');
    }
}
