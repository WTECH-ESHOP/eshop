<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateProductsTable extends Migration {

    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('subcategory_id')->constrained('categories')->nullOnDelete();
            $table->text('description');
            $table->json('images');
            $table->enum('unit', ['G', 'KS'])->default('G');
            // brand enum
            $table->text('information');
            $table->timestamps();
            $table->index('name');
        });

        DB::statement("ALTER TABLE products ADD COLUMN brand BRAND_E NOT NULL");
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('products');
    }
}
