<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemSizeTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('item_size', function (Blueprint $table) {
      $table->integer('item_id')->unsigned();
      $table->foreign('item_id')->references('id')->on('items');
      $table->integer('size_id')->unsigned();
      $table->foreign('size_id')->references('id')->on('sizes');
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
    Schema::dropIfExists('item_size');
  }
}
