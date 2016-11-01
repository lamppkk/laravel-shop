<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('items', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('price');
      $table->string('name');
      $table->text('description');
      $table->integer('sub_category_id')->unsigned();
      $table->foreign('sub_category_id')->references('id')->on('sub_categories');
      $table->integer('season_id')->unsigned();
      $table->foreign('season_id')->references('id')->on('seasons');
      $table->integer('brand_id')->unsigned();
      $table->foreign('brand_id')->references('id')->on('brands');
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
    Schema::dropIfExists('items');
  }
}
