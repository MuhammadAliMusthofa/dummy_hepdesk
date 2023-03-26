<?php

use App\Models\AdminHelpdesk;
use Illuminate\Database\Seeder;

class AdminHelpdeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminHelpdesk::create([
            'id_pengguna' => 1,
            'active' => 0
        ]);
    }
}
