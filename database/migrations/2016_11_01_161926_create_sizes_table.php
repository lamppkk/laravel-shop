<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('sizes', function (Blueprint $table) {
      $table->increments('id');
      $table->integer('size_value_id')->unsigned();
      $table->foreign('size_value_id')->references('id')->on('size_values')->onDelete('cascade');
      $table->integer('size_type_id')->unsigned();
      $table->foreign('size_type_id')->references('id')->on('size_types')->onDelete('cascade');
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
