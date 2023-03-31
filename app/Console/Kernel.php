<?php

namespace App\Console;

use App\Models\Tiket;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\AkhiriTiket::class,
        Commands\ReminderTiket::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->call(function () {
        //     info('sudah berjalan');
        // })->everyMinute();
        $tikets = Tiket::where('status', 1)->get();
        foreach ($tikets as $tiket) {
            $kadalurasa = strtotime($tiket->kadaluarsa);
            $minutes = idate('i', $kadalurasa);
            $hours =  idate('H', $kadalurasa);
            $days = idate('d', $kadalurasa);
            $month = idate('m', $kadalurasa);
            $schedule->command('akhiri:tiket', [$tiket->id_tiket])->cron($minutes . ' ' . $hours . ' ' . $days . ' ' . $month . ' *');
            $schedule->command('reminder:tiket', [$tiket->id_tiket])->cron(($minutes - 10) . ' ' . $hours . ' ' . $days . ' ' . $month . ' *');
        }
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
