<?php

namespace App\Http\Controllers;

use App\Models\AdminHelpdesk;
use App\Models\Tiket;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminChatController extends Controller
{
    public $notifikasi;
    public function __construct()
    {
        $this->notifikasi = new NotifikasiController;
    }
    public function index()
    {
        return view('admin.dashboard');
    }
    public function admin_chat_head()
    {
        return view('admin.admin_chat_head');
    }

    public function admin_chat_main($id_pengguna)
    {
        $adminHelpdesk = AdminHelpdesk::where('id_pengguna', $id_pengguna)->first();

        $tiketsAntrian = 0;
        $tiketsBerjalan = 0;
        $tiketsTertunda = 0;
        $tiketsSelesai = 0;

        // jika admin helpdesk sedang aktiv
        if ($adminHelpdesk && $adminHelpdesk->active) {
            $tiketsAntrian = Tiket::where([
                'status' => 0,
                'id_pengguna_admin' => null
            ])->with('pesan')->get();

            $tiketsBerjalan = Tiket::where([
                'id_pengguna_admin' => $id_pengguna,
                'status' => 1
            ])->orderBy('kadaluarsa')->with('pesan')->get();

            $tiketsTertunda = Tiket::where([
                'id_pengguna_admin' => $id_pengguna,
                'status' => 2
            ])->orderBy('updated_at')->with('pesan')->get();

            $tiketsSelesai = Tiket::where([
                'status' => 3
            ])->orderBy('updated_at')->with('pesan')->get();
        }

        return view('admin.admin_chat_main', [
            'tiketsAntrian' => $tiketsAntrian,
            'tiketsBerjalan' => $tiketsBerjalan,
            'tiketsTertunda' => $tiketsTertunda,
            'tiketsSelesai' => $tiketsSelesai,
        ]);
    }

    public function showSearch(Request $request)
    {
        $query = $request->querySearch;
        $fillterNama = $request->fillterNama;
        $fillterWaktu = $request->fillterWaktu;
        $fillterDepart = $request->fillterDepart;
        $status = $request->status;

        // berdasarkan waktu
        $to = Carbon::now();
        switch ($fillterWaktu) {
            case 1:
                $to = $to->subDays(7);
                break;
            case 2:
                $to = $to->subDays(30);
                break;
            case 3:
                $to = $to->subDays(365);
                break;
            default:
                $to = '';
                break;
        }

        $tiketsAll = Tiket::where('status', $status)->with(['pengguna_user', 'pengguna_admin'])->get();
        $tikets = [];

        switch ($fillterNama) {
            case 1:
                foreach ($tiketsAll as $key => $tiket) {
                    $user_name = $tiket->pengguna_user->user_name;

                    if (str_contains($user_name, $query) && $query != '') {
                        $result = Tiket::where([
                            'id_tiket' => $tiket->id_tiket,
                        ])->with('pesan')->first();
                        $tikets[$key] = $result;
                    }
                }
                break;
            case 2:
                foreach ($tiketsAll as $key => $tiket) {
                    $user_name = $tiket->pengguna_admin->user_name;

                    if (str_contains($user_name, $query) && $query != '') {
                        $result = Tiket::where('id_tiket', $tiket->id_tiket)->with('pesan')->first();
                        $tikets[$key] = $result;
                    }
                }
                break;
            default:
                $tikets = Tiket::where([
                    'status' => $status,
                    ['created_at', '>', $to],
                    ['nama', 'like', '%' . $query . '%'],
                ])->with('pesan')->get();
                break;
        }


        // dd($tikets);
        return view('admin.subcontent.search', ['tikets' => $tikets]);
    }

    public function home()
    {
        $id_pengguna = Auth::id();
        $adminHelpdesk = AdminHelpdesk::where('id_pengguna', $id_pengguna)->first();
        $tikets = Tiket::where([
            'status' => 0,
            'id_pengguna_admin' => null
        ])->get();
        $count = count($tikets);
        return view('admin.subcontent.home', ['count' => $count, 'adminHelpdesk' => $adminHelpdesk]);
    }

    public function melayani($active)
    {
        $id_pengguna = Auth::id();
        $adminHelpdesk = AdminHelpdesk::where('id_pengguna', $id_pengguna);

        if (!$adminHelpdesk->first()) {
            AdminHelpdesk::create([
                'id_pengguna' => $id_pengguna,
            ]);
            $adminHelpdesk = AdminHelpdesk::where('id_pengguna', $id_pengguna);
        }

        $update = $adminHelpdesk->update(['active' => $active]);

        if ($update) {
            return response('siap melayani');
        }
        return response('tidak melayani', 400);
    }

    public function pesan($id_tiket)
    {
        $tiket = Tiket::where([
            'id_tiket' => $id_tiket,
        ])->with('pesanPerTiket')->first();
        return view(
            'admin.subcontent.chat_user',
            ['tiket' => $tiket]
        );
    }

    public function update($id_tiket, $status)
    {
        $time = null;
        $aksi = 0;
        if ($status == 1) {
            $aksi = 'berjalan';
            $time = Carbon::now()->addMinute(30)->format('Y-m-d H:i:s');
        } else if ($status == 2) {
            $aksi = 'ditunda';
        }

        $tiket = Tiket::where([
            'id_tiket' => $id_tiket,
        ]);
        $tik = $tiket->first();
        $tiket->update([
            'status' => $status,
            'kadaluarsa' => $time
        ]);
        if ($tiket) {
            // kirim notifikasi
            $this->notifikasi->index($id_tiket, $tik->nama, 'Admin telah merubah status menjadi ' . $aksi, $aksi);

            return response('berhasil merubah status tiket');
        }
        return response('gagal merubah status tiket', 400);
    }

    public function pesanTerima($id_tiket, $id_pengguna)
    {
        $tiket = Tiket::where([
            'id_tiket' => $id_tiket,
            'id_pengguna_admin' => null
        ])->first();

        if ($tiket) {
            $tikets = Tiket::where([
                'id_tiket' => $id_tiket,
            ]);
            $tik = $tikets->first();
            $tikets->update([
                'id_pengguna_admin' => $id_pengguna,
                'status' => 1,
                'kadaluarsa' => Carbon::now()->addMinute(30)->format('Y-m-d H:i:s')
            ]);
            // kirim notifikasi
            $this->notifikasi->index($id_tiket, $tik->nama, 'pesan anda diterima', 'diterima');

            return response('berhasil menerima data');
        } else {
            return response('gagal menerima tiket karena sudah diterima helpdesk lain', 400);;
        }
    }

    public function detail($id_tiket)
    {
        $tiket = Tiket::where('id_tiket', $id_tiket)->first();
        return view('admin.subcontent.detail', ['tiket' => $tiket]);
    }

    public function akhiriPesan($id_tiket)
    {
        $tiket = Tiket::where('id_tiket', $id_tiket);
        $tik = $tiket->first();
        if ($tik) {
            $tiket->update([
                'status' => 3,
                'kadaluarsa' => null
            ]);
            // kirim notifikasi
            $this->notifikasi->index($id_tiket, $tik->nama,  'Anda telah mengakhiri obrolan ini', 'diakhiri');

            return response('pesan diakhiri');
        } else {
            return response('gagal mengakhiri pesan', 400);;
        }
    }
}
