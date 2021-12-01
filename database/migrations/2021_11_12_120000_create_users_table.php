<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration {

    public function up() {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('password');
            // payment enum
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE users ADD COLUMN payment PAYMENT_E NOT NULL DEFAULT E'ONLINE'");
    }

    public function down() {
        Schema::dropIfExists('users');
    }
}
