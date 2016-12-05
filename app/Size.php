<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
  /**
   * Продукты, у которых есть в наличии данный размер
   */
  public function items() {
    return $this->belongsToMany('App\Item', 'available_sizes')
      ->withTimestamps();
  }
}
