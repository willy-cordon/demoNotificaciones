<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Willy',
            'email' => 'wcordon@provincianet.com.ar',
            'password' => app('hash')->make('provincianet')
        ]);
    }
}
