<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeType extends Model
{
  //////////////////////////////////////////////
  // НАСТРОЙКИ
  //////////////////////////////////////////////

  protected $table = 'size_types';


  //////////////////////////////////////////////
  // СВЯЗИ
  //////////////////////////////////////////////

  /**
   * Связывает данный тип размера со значениями размеров
   */
  public function size_values()
  {
    return $this->belongsToMany('App\SizeValue', 'sizes', 'size_type_id', 'size_value_id')
      ->withPivot('id')
      ->withTimestamps();
  }

  /**
   * Связывает данный тип размера с подкатегориями, к которым он относится
   */
  public function sub_categories()
  {
    return $this->belongsToMany('App\SubCategory', 'size_type_sub_category', 'size_type_id', 'sub_category_id')
      ->withTimestamps();
  }
}
