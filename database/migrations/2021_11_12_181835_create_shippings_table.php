<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
  public function up()
  {
    Schema::create('shippings', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->unsignedInteger('time')->default(0);
      $table->unsignedDouble('price')->default(0);
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('shippings');
  }
}
