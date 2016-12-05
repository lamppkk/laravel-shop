<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizeTypeSubCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size_type_sub_category', function (Blueprint $table) {
          $table->integer('size_type_id')->unsigned();
          $table->foreign('size_type_id')->references('id')->on('size_types')->onDelete('cascade');
          $table->integer('sub_category_id')->unsigned();
          $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
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
        Schema::dropIfExists('size_type_sub_category');
    }
}
