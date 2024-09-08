<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBeasiswa;
use App\Models\Beasiswa;


class KategoriBeasiswaController extends Controller
{
    public function index()
    {
        $pilihan_beasiswa = KategoriBeasiswa::all();
        $beasiswa = Beasiswa::has('kategori')->get();
        return view('app.page.pilihan_beasiswa', compact('pilihan_beasiswa', 'beasiswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',

        ]);

        KategoriBeasiswa::create([
            'nama_kategori' => $request->nama,
        ]);

        return redirect()->route('kategory_beasiswa');
    }

    public function verify_user(Request $request)
    {
        $value = $request->value;
        $beasiswa = Beasiswa::find($request->id);
        $beasiswa->status_ajuan = $value;
        $beasiswa->save();
        return redirect()->route('kategory_beasiswa')->with('success', 'Berkas berhasil diverifikasi');
    }
}
