<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  /**
   * Какой пользователь сделал данный заказ
   */
  public function user() {
    return $this->belongsTo('App\User');
  }

  /**
   * Продукты, находящиеся в данном заказе (и в каком количестве)
   */
  public function order_items() {
    return $this->hasMany('App\OrderItem');
  }
}
