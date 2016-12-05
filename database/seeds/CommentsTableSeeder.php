<?php

use Illuminate\Database\Seeder;

use App\Comment;
use App\User;
use App\Item;

class CommentsTableSeeder extends Seeder
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
//    factory(App\Comment::class, 10)->create();

    $comments = factory(App\Comment::class, 10)->make();

    $users = User::all();
    $items = Item::all();
    foreach ($comments as $comment) {
      $comment->user_id = $users->random()->id;
      $comment->item_id = $items->random()->id;
      $comment->save();
    }
  }
}
