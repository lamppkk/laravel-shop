<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizeValue extends Model
{
  //////////////////////////////////////////////
  // НАСТРОЙКИ
  //////////////////////////////////////////////

  protected $table = 'size_values';


  //////////////////////////////////////////////
  // СВЯЗИ
  //////////////////////////////////////////////

  /**
   * Связывает данное значение с типами размеров
   */
  public function size_types()
  {
    return $this->belongsToMany('App\SizeType', 'sizes', 'size_value_id', 'size_type_id')
      ->withPivot('id')
      ->withTimestamps();
  }
}
