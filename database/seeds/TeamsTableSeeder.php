<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $team = new \App\Team([
            'id' =>2,
            'name' => 'Bucks',
            'abname' => 'MIL',
            'state_name' => 'Milwaukee'
            ]);
            $team->save();
    }
}
