<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new \App\Comment([
        'id' => 3,
        'contents'=> '髭の妖精',
        'user_id' => 1,
        'post_id' => 1
        ]);
            $comment->save();
    }
}
