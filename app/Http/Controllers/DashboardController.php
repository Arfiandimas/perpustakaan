<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Services\Dashboard\AnggotaTopFiveService;
use App\Services\Dashboard\BukuTopFiveService;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota_top5 = (new AnggotaTopFiveService())->call();
        if (!$anggota_top5->status()) {
            return redirect()->back()->with(['status'=> $anggota_top5->state(), 'message'=> $anggota_top5->message()]);
        }
        $anggota_top5 = $anggota_top5->result();

        $top5buku = (new BukuTopFiveService())->call();
        if (!$top5buku->status()) {
            return redirect()->back()->with(['status'=> $top5buku->state(), 'message'=> $top5buku->message()]);
        }
        $top5buku = $top5buku->result();
        
        $topBukuAllTime = (new BukuTopFiveService())->call();
        if (!$topBukuAllTime->status()) {
            return redirect()->back()->with(['status'=> $topBukuAllTime->state(), 'message'=> $topBukuAllTime->message()]);
        }
        $topBukuAllTime = $topBukuAllTime->result();
        return view('dashboard', compact('anggota_top5', 'top5buku', 'topBukuAllTime'));
    }
}
