<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  /**
   * Бренд товара
   */
  public function brand()
  {
    return $this->belongsTo('App\Brand');
  }

  /**
   * Сезон товара
   */
  public function season()
  {
    return $this->belongsTo('App\Season');
  }

  /**
   * Подкатегория товара
   */
  public function sub_category()
  {
    return $this->belongsTo('App\SubCategory', 'sub_category_id');
  }

  /**
   * Цвета товара
   */
  public function colors()
  {
    return $this->belongsToMany('App\Color')->withTimestamps();
  }

  /**
   * Изображения товара
   */
  public function images()
  {
    return $this->hasMany('App\Image');
  }

  /**
   * Размеры, которые есть в наличии у данного продукта
   */
  public function sizes() {
    return $this->belongsToMany('App\Size', 'available_sizes')
      ->withTimestamps();
  }
}
