<?php

use Illuminate\Database\Seeder;

class PlayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $player = new \App\Player([
        'id' => 2,
        'height' => 211.0,
        'weight' => 110.0,
        'PPG'=> 29.8,
        'RPG' => 11.5,
        'APG' => 5.8,
        'MPG' => 32.9,
        'FG' => 54.7,
        'three_point' => 30.0,
        'FT' => 72.1,
        'team_id' => 2,
        'position_id' => 4,
        'first_name' => 'Giannis',
        'last_name' => 'Antetokounmpo',
        'age' => 27,
        'image' => 'Giannis_Antetokounmpo.jpg'
        ]);
            $player->save();
    }
}
