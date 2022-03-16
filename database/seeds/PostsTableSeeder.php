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
            'id' => 1,
            'content' => 'He is the best SG player Ive ever seen',
            'review' => 5,
            'player_id' => 1,
            'user_id' => 1
            ]);
            $post->save();
    }
}
