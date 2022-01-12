<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrderProductsTable extends Migration {
    public function up() {

        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->nullOnDelete();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->unsignedInteger('amount')->default(1);
            // flavour enum
            $table->unsignedInteger('volume');
            $table->unsignedDouble('price');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE order_products ADD COLUMN flavour FLAVOUR_E");
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('order_products');
    }
}
