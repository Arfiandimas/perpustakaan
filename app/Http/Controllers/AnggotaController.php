<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnggotaRequest;
use App\Models\Anggota;
use App\Services\Anggota\AddUpdateAnggotaService;
use App\Services\Anggota\DeleteAnggotaService;
use App\Services\Anggota\GetAnggotaServie;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = (new GetAnggotaServie())->call();
        if (!$members->status()) {
            return redirect()->back()->with(['status'=> $members->state(), 'message'=> $members->message()]);
        }
        $members = $members->result();
        return view('anggota.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnggotaRequest $request)
    {
        $member = (new AddUpdateAnggotaService($request))->call();
        if (!$member->status()) {
            return redirect()->back()->with(['status'=> $member->state(), 'message'=> $member->message()]);
        }
        return redirect()->route('anggota.show', $member->result())->with(['status'=> $member->state(), 'message'=> $member->message()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = (new GetAnggotaServie())->setId((int)$id)->call();
        if (!$member->status()) {
            return redirect()->back()->with(['status'=> $member->state(), 'message'=> $member->message()]);
        }
        $member = $member->result();
        return view('anggota.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = (new GetAnggotaServie())->setId((int)$id)->call();
        if (!$member->status()) {
            return redirect()->back()->with(['status'=> $member->state(), 'message'=> $member->message()]);
        }
        $member = $member->result();
        return view('anggota.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnggotaRequest $request, string $id)
    {
        $member = (new AddUpdateAnggotaService($request))->setId($id)->call();
        if (!$member->status()) {
            return redirect()->back()->with(['status'=> $member->state(), 'message'=> $member->message()]);
        }
        return redirect()->route('anggota.show', $member->result())->with(['status'=> $member->state(), 'message'=> $member->message()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = (new DeleteAnggotaService($id))->call();
        if (!$member->status()) {
            return redirect()->back()->with(['status'=> $member->state(), 'message'=> $member->message()]);
        }
        return redirect()->route('anggota.index')->with(['status'=> $member->state(), 'message'=> $member->message()]);
    }
}
