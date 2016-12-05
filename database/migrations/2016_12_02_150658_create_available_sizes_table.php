<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailableSizesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('available_sizes', function (Blueprint $table) {
      $table->integer('item_id')->unsigned();
      $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
      $table->integer('size_id')->unsigned();
      $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('available_sizes');
  }
}
