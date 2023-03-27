<?php


use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use App\Models\SSD;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ssdSeeder extends Seeder
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
        $randomDate->format('Y-m-d');
        
        $id = Str::random(100);

        $faker = Faker::create();

        // Generate dummy data for users table
        for ($i=0; $i < 5; $i++) { 
            DB::table('ssd')->insert([
                'pertanyaan' => 'Bagaimana Cara dosen',
                'tanggal' => $randomDate,
                'jawaban' => 'Untuk mengubah agar dosen bisa melakukan',
                'created_by' =>  'helpdesk 1',
                'id_role_pengguna' =>  6,
                'edited_by' => 'helpdesk 2',
                'kategori' => 'dosen',
                'status' => 'on'
               
                
                // 'created_at' => $randomDateString,
                // 'updated_at' => $randomDateString,
            ]);
        }
    }
}