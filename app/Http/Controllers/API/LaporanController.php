<?php

namespace App\Http\Controllers\Api;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Laporan::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'lokasi' => ['required'],
            'keterangan' => ['required'],
        ]);

        Laporan::create([
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
        ]);

        return 'Laporan berhasil dibuat';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        return response()->json($laporan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        $request->validate([
            'lokasi' => ['required'],
            'keterangan' => ['required'],
        ]);

        $laporan->update([
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return "Laporan sudah terhapus";
    }
}
