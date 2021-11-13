<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuantitiesTable extends Migration
{

  public function up()
  {
    Schema::create('quantities', function (Blueprint $table) {
      $table->id();
      $table->foreignId('variant_id')->constrained('variants')->cascadeOnDelete();
      $table->unsignedInteger('volume');
      $table->unsignedInteger('amount');
      $table->unsignedDouble('price');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::enableForeignKeyConstraints();
    Schema::dropIfExists('quantities');
  }
}
