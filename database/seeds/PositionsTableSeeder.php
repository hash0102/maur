<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = new \App\Position([
            'id' => 1,
            'name' => 'PG'
            ]);
            $position->save();
    }
}
