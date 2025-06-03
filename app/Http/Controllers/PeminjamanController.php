<?php

namespace App\Http\Controllers;

use App\Services\TransaksiBuku\PengembalianBukuService;
use App\Services\TransaksiBuku\GetTransaksiBukuService;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peminjaman = (new GetTransaksiBukuService())->call();
        if (!$peminjaman->status()) {
            return redirect()->back()->with(['status'=> $peminjaman->state(), 'message'=> $peminjaman->message()]);
        }
        $peminjaman = $peminjaman->result();
        return view('peminjaman.index', compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peminjaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = (new PengembalianBukuService($request, (int)$id))->call();
        if (!$data->status()) {
            return redirect()->back()->with(['status'=> $data->state(), 'message'=> $data->message()]);
        }
        return redirect()->route('pengembalian.index')->with(['status'=> $data->state(), 'message'=> $data->message()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
