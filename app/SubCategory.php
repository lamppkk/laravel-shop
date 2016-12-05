<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
  //////////////////////////////////////////////
  // НАСТРОЙКИ
  //////////////////////////////////////////////

  protected $table = 'sub_categories';


  //////////////////////////////////////////////
  // СВЯЗИ
  //////////////////////////////////////////////

  /**
   * Категория данной подкатегории
   */
  public function category()
  {
    return $this->belongsTo('App\Category', 'category_id');
  }

  /**
   * Все продукты данной Подкатегории
   */
  public function items()
  {
    return $this->hasMany('App\Item', 'sub_category_id');
  }

  /**
   * Типы размеров, которые относятся к этой подкатегории
   */
  public function size_types()
  {
    return $this->belongsToMany('App\SizeType', 'size_type_sub_category', 'sub_category_id', 'size_type_id')
      ->withTimestamps();
  }
}
