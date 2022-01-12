<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateVariantsTable extends Migration {

    public function up() {
        Schema::create('variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete();
            // flavour enum
            $table->timestamps();
        });

        DB::statement("ALTER TABLE variants ADD COLUMN flavour FLAVOUR_E");
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('variants');
    }
}
