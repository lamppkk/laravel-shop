<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Order;
use App\Item;

class OrdersSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * !! Зависимости от сидеров: UsersSeeder, ItemsTableSeeder !!
   *
   * @return void
   */
  public function run()
  {
//    factory(App\Order::class, 5)->create();
//    factory(App\OrderItem::class, 15)->create();

    $orders = factory(App\Order::class, 5)->make();


    $users = User::all();
    $items = Item::all();
    foreach ($orders as $order) {
      $order->user_id = $users->random()->id;
      $order->save();

      $order_items = factory(App\OrderItem::class, $i = rand(1, 5))->make();
      if ($i > 1) {
        foreach ($order_items as $order_item) {
          $order_item->item_id = $items->random()->id;
        }
        $order->order_items()->saveMany($order_items);
      } else {
        $order_items->item_id = $items->random()->id;
        $order->order_items()->save($order_items);
      }
    }
  }
}
