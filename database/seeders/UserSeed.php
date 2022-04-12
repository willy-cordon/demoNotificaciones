<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Willy',
            'email' => 'wcordon@provincianet.com.ar',
            'root' => true,
            'password' => app('hash')->make('provincianet')
        ]);
    }
}
