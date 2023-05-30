<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name'=>'احمد فايز عماد',
            'email'=>'ahmedemad2712@gmail.com',
            'password'=>'$2y$10$P3phagPpl/2fJ0qhW6SmsuqVSNdY3EsN7YtYtC0aTWAlrh6CnlfKy'
        ] );
        //
    }
}
