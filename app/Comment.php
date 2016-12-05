<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  /**
   * Какого пользователя данный комментарий
   */
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  /**
   * К какому продукту относится данный комментарий
   */
  public function item() {
    return $this->belongsTo('App\Item');
  }
}
