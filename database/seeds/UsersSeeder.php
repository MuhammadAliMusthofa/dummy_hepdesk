<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'user_name' => 'dummyHelpdesk',
            'password' => Hash::make('dummy123'),
            'nm_pengguna' => 'dosen123',
            'role' => 0,
            'email' => 'dummyHelpdesk@gmail.com',
        ]);
    }
}
