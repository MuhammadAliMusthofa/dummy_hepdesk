<?php


use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Tiket;
use Carbon\Carbon;

class TiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $startDate = strtotime("2010-01-01");
        // $endDate = strtotime("2023-12-31");

        // $random_date = Carbon::now()->addDays(rand(1, 30))->addHours(rand(0, 23))->addMinutes(rand(0, 59))->addSeconds(rand(0, 59));
        // Buat tanggal acak
        // $randomDate = rand($startDate, $endDate);
        $randomDate = Carbon::createFromTimestamp(rand(1640995200, time()));
        // $randomDate->format('Y-m-d H:i:s');
        // Format tanggal sebagai YYYY-MM-DD
        $randomDate->format('Y-m-d H:i:s');
        //
        $faker = Faker::create();

        // Generate dummy data for users table
        for ($i=0; $i < 50; $i++) { 
            DB::table('tiket')->insert([
                'nama' => $faker->name,
                'tanggal' => $randomDate,
                'email' => $faker->email,
                'departemen' => 'dosen',
                'experied' => $randomDate,
                'helpdesk' => 'admin',
                // 'created_at' => $randomDateString,
                // 'updated_at' => $randomDateString,
            ]);
        }
    }
}
