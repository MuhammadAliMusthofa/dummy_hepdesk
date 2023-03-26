<?php

namespace App\Console\Commands;

use App\Http\Controllers\NotifikasiController;
use Illuminate\Console\Command;

class ReminderTiket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:tiket {id_tiket}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $id_tiket = $this->argument('id_tiket');

        $notifikasi = new NotifikasiController;
        $notifikasi->index($id_tiket, 'kosong', 'Sisa waktu obrolan anda 10 menit', 'waktu-10mnt');
    }
}
