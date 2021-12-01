<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration {

    public function up() {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('postal_code');
            $table->boolean('active')->default(false);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('addresses');
    }
}
