<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beasiswa;
use App\Models\KategoriBeasiswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class BeasiswaController extends Controller
{
    public function index()
    {
        $pilihan_beasiswa = KategoriBeasiswa::all();
        return view('app.page.daftar', compact('pilihan_beasiswa'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'email' => 'required|max:255',
            'no_hp' => 'required',
            'semester' => 'required',
            'ipk' => 'required',
            'jenis_beasiswa' => 'required',
            'file' => 'required|mimes:pdf,jpg,zip|max:2048',
        ]);

        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tujuan_upload = 'public/data_file';
        Storage::putFileAs($tujuan_upload, $file, $nama_file);

        Beasiswa::create([
            'nama' => $request->nama,
            'user_id' => Auth::user()->id,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'semester' => $request->semester,
            'ipk' => $request->ipk,
            'jenis_beasiswa' => $request->jenis_beasiswa,
            'file' => $nama_file,
        ]);

        return redirect()->route('show.beasiswa');
    }

    public function show()
    {
        // tampilkan berdasarkan user yang login dan relasi dengan kategori beasiswa
        $beasiswa = Beasiswa::where('user_id', Auth::user()->id)->has('kategori')->get();

        // tampilkan semua data beasiswa
        // $beasiswa = Beasiswa::has('kategori')->get();


        return view('app.page.hasil', compact('beasiswa'));
    }
}
