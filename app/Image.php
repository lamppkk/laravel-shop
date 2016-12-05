<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  /**
   * К какому товару относится данное изображение
   */
  public function item()
  {
    return $this->belongsTo('App\Item');
  }
}
