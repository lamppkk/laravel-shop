<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
  /**
   * Заказ, к которому относится данный продукт
   */
  public function order()
  {
    return $this->belongsTo('App\Order');
  }

  /**
   * Продукт, который входит в заказ
   */
  public function item()
  {
    return $this->belongsTo('App\Item');
  }
}
