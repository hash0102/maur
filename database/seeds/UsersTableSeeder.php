<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
            'name' => 'SampleUser1',
            'email' => 'sammple1@yahoo.co.jp',
            'password' => 'abcdefg'
            ]);
        $user->save();
    }
}
