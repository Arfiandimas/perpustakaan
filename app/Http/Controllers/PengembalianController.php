<?php

namespace App\Http\Controllers;

use App\Services\TransaksiBuku\GetTransaksiBukuService;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengembalian = (new GetTransaksiBukuService())->setPengembalian()->call();
        if (!$pengembalian->status()) {
            return redirect()->back()->with(['status'=> $pengembalian->state(), 'message'=> $pengembalian->message()]);
        }
        $pengembalian = $pengembalian->result();
        return view('pengembalian.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
