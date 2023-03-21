<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // $faker = Faker::create();

        // // Generate dummy data for users table
        // for ($i=0; $i < 50; $i++) { 
        //     DB::table('users')->insert([
        //         'user_name' => $faker->name,

        //         'email' => $faker->email,
        //         'nm_pengguna' => 'null',
        //         'role' => '0',
        //         'password' => bcrypt('password'),
        //     ]);
        // }
    }
}
