<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
  /**
   * Все товары с данным цветом
   */
  public function items()
  {
    return $this->belongsToMany('App\Item')->withTimestamps();
  }
}
