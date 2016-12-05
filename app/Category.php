<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  //////////////////////////////////////////////
  // НАСТРОЙКИ
  //////////////////////////////////////////////

  protected $table = 'categories';


  //////////////////////////////////////////////
  // СВЯЗИ
  //////////////////////////////////////////////

  /**
   * Подкатегории данной категории
   */
  public function sub_categories() {
    return $this->hasMany('App\SubCategory', 'category_id');
  }

  /**
   * Продукты данной категории
   */
  public function items() {
    return $this->hasManyThrough('App\Item', 'App\SubCategory', 'category_id', 'sub_category_id');
  }
}
