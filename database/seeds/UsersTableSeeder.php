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
            'name' => 'Shota',
            'email' => 'maur@yahoo.co.jp',
            'password' => 'abcdefg'
            ]);
        $user->save();
    }
}
