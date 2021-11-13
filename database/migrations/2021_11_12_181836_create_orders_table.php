<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateOrdersTable extends Migration
{
  public function up()
  {
    Schema::create('orders', function (Blueprint $table) {
      $table->id();
      $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
      $table->foreignId('shipping_id')->constrained('shippings')->nullOnDelete();
      // payment enum
      $table->enum('status', ['PENDING', 'SHIPPED', 'COMPLETED'])->default('PENDING');
      $table->text('note')->nullable();
      $table->string('first_name');
      $table->string('last_name');
      $table->string('email');
      $table->string('phone_number');
      $table->string('address');
      $table->timestamps();
    });

    DB::statement("ALTER TABLE orders ADD COLUMN payment PAYMENT_E NOT NULL");
  }

  public function down()
  {
    Schema::enableForeignKeyConstraints();
    Schema::dropIfExists('orders');
  }
}
