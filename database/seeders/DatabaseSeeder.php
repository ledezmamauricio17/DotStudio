<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $user = new User();
        $user->name = "Mauricio Ledezma";
        $user->email = "ledezmamauricio17@gmail.com";
        $user->type = "2";
        $user->telefono = "12342342";
        $user->password = "$2y$10$.ss650lfrHa7YgyJEkPFluVKttaeDlPjhSj1VZRDP5iejQNbI8uxK";
        $user->save();

        $user = new User();
        $user->name = "Stiven Julian";
        $user->email = "stivenjulian@gmail.com";
        $user->type = "1";
        $user->telefono = "12342342";
        $user->password = "$2y$10$.ss650lfrHa7YgyJEkPFluVKttaeDlPjhSj1VZRDP5iejQNbI8uxK";
        $user->save();

        \App\Models\Training::factory(5)->create();

    }
}
