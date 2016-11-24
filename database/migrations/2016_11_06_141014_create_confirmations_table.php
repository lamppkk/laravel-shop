<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmationsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('confirmations', function (Blueprint $table) {
      $table->string('email')->unique()->index();
      $table->foreign('email')->references('email')->on('users');
      $table->string('token');
      $table->dateTime('lifetime');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('confirmations');
  }
}
