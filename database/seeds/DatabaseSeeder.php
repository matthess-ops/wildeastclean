<?php

use App\Kratmeister;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'name' => 'matthijn',
            'email' =>'matthijnwur@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->call([
            BookSeeder::class,
            KratmeisterSeeder::class,
            BeerbrandSeeder::class,


        ]);
    }
}
