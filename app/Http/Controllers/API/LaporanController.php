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
        //buat array dulu dengan key laporan, isinya baru laporannya
        //return response()->json(Laporan::orderBy("id","desc")->get());
        return response()->json([
            'laporan' => Laporan::orderBy("id","desc")->get(),
        ]);
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
            // 'image' => ['required'],
        ]);

        $nama_image = NULL; // kalau udah required gak usah pakai ini
        if($request->image != NULL){ // kalau udah required gak usah pakai ini
            $image = $request->file('image');
            $nama_image = rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('lokasi_gambar/'), $nama_image);
            //$image_location = 'lokasi_gambar/' . $nama_image;
          //$image_location = config('app.url').'lokasi_gambar/' . $nama_image;
          $image_location = url('').'/'.'lokasi_gambar/' . $nama_image;
        }

        Laporan::create([
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
            'image' => $image_location,
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

        return "Laporan berhasil di update";
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
