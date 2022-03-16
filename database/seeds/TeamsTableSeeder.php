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
            'id' => 1,
            'name' => '76ers',
            'abname' => 'PHI',
            'state_name' => 'philadelphia'
            ]);
            $team->save();
    }
}
