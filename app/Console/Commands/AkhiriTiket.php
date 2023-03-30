<?php

namespace App\Console\Commands;

use App\Models\Tiket;
use Illuminate\Console\Command;
use App\Events\Message;
use App\Http\Controllers\NotifikasiController;

class AkhiriTiket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'akhiri:tiket {id_tiket}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'mengakhiri tiket jika sudah kadaluarsa';

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
        $this->akhiriTiket($id_tiket);
        $this->info('Tiket sudah kadaluarsa');
    }

    public function akhiriTiket($id_tiket)
    {
        $tikets = Tiket::where('id_tiket', $id_tiket);
        $tik = $tikets->first();
        $tikets->update([
            'status' => 3
        ]);

        $notifikasi = new NotifikasiController;
        $notifikasi->index($id_tiket, $tik->nama, 'Waktu obrolan sudah habis.', 'waktu habis');
    }
}
