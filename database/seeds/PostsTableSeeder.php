<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = new \App\Post([
            'id' => 2,
            'content' => 'He is the best PF player Ive ever seen',
            'offense_review' => 95,
            'defense_review' => 93,
            'player_id' => 2,
            'user_id' => 1
            ]);
            $post->save();
    }
}
