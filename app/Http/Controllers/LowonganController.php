<?php

namespace App\Http\Controllers;

use App\Models\Lowongan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{

    public function index()
    {
        $lowongans = Lowongan::latest()->paginate(10);
        return view('lowongan.index', compact('lowongans')); // Menggunakan view yang sama
    }

    public function show(Lowongan $lowongan)
    {
        return view('lowongan.show', compact('lowongan')); // Menggunakan view yang sama
    }
}