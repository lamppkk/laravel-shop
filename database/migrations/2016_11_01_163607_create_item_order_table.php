<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemOrderTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('item_order', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('order_id')->unsigned();
      $table->foreign('order_id')->references('id')->on('orders');
      $table->integer('item_id')->unsigned();
      $table->foreign('item_id')->references('id')->on('items');
      $table->integer('count');
      $table->integer('total');
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
    Schema::dropIfExists('item_order');
  }
}
