<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Untuk upload file

class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lowongans = Lowongan::latest()->paginate(10); // Menampilkan lowongan terbaru, 10 per halaman
        return view('lowongan.index', compact('lowongans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lowongan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_pekerjaan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'gaji' => 'nullable|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
            'logo_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Max 2MB
        ]);

        $data = $request->all();

        if ($request->hasFile('logo_perusahaan')) {
            $path = $request->file('logo_perusahaan')->store('public/logos');
            $data['logo_perusahaan'] = Storage::url($path);
        }

        Lowongan::create($data);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lowongan $lowongan)
    {
        return view('lowongan.show', compact('lowongan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lowongan $lowongan)
    {
        return view('lowongan.edit', compact('lowongan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lowongan $lowongan)
    {
        $request->validate([
            'judul_pekerjaan' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'gaji' => 'nullable|string|max:255',
            'deskripsi_pekerjaan' => 'required|string',
            'logo_perusahaan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo_perusahaan')) {
            // Hapus logo lama jika ada
            if ($lowongan->logo_perusahaan) {
                Storage::delete(str_replace('/storage', 'public', $lowongan->logo_perusahaan));
            }
            $path = $request->file('logo_perusahaan')->store('public/logos');
            $data['logo_perusahaan'] = Storage::url($path);
        }

        $lowongan->update($data);

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lowongan $lowongan)
    {
        // Hapus logo perusahaan jika ada
        if ($lowongan->logo_perusahaan) {
            Storage::delete(str_replace('/storage', 'public', $lowongan->logo_perusahaan));
        }
        $lowongan->delete();

        return redirect()->route('lowongan.index')->with('success', 'Lowongan berhasil dihapus!');
    }
}