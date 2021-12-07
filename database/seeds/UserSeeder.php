<?php

use App\User;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Amira Elsayed ',
            'email' => 'amiraelsayed9090@gmail.com',
            'password' => bcrypt('asdasdas'),
            'type' => 'admin',
            ]);
    }
}
