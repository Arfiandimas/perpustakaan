<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota_top5 = Anggota::withCount(['transaksiPeminjaman' => function ($query) {
            $query->whereBetween('tanggal_pinjam', [
                Carbon::now()->startOfWeek(), 
                Carbon::now()->endOfWeek()
            ]);
        }])
        ->having('transaksi_peminjaman_count', '>', 0)
        ->orderByDesc('transaksi_peminjaman_count')
        ->take(5)
        ->get();

        $top5buku = Buku::withCount(['transaksiPeminjaman' => function ($query) {
            $query->whereBetween('tanggal_pinjam', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ]);
        }])
        ->having('transaksi_peminjaman_count', '>', 0)
        ->orderByDesc('transaksi_peminjaman_count')
        ->take(5)
        ->get();

        
        $topBukuAllTime = Buku::withCount('transaksiPeminjaman')
        ->having('transaksi_peminjaman_count', '>', 0)
        ->orderByDesc('transaksi_peminjaman_count')
        ->take(8)
        ->get();
        return view('dashboard', compact('anggota_top5', 'top5buku', 'topBukuAllTime'));
    }
}
