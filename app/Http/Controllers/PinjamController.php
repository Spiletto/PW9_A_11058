<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\PinjamBuku;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjam_buku = PinjamBuku::whereNull('tanggal_kembali')->paginate(5);
        $buku = Buku::paginate(5);

        return view('pinjam', compact('pinjam_buku', 'buku'));
    }

    public function store(Request $request, $id)
    {
    $buku = Buku::find($id);

    if ($buku && $buku->status === 'Tersedia') {
        // Ubah status buku menjadi "Dipinjam"
        $buku->status = 'Dipinjam';
        $buku->save();

        // Proses penyimpanan pinjam buku
        $pinjam_buku = new PinjamBuku();
        $pinjam_buku->id_buku = $buku->id;
        $pinjam_buku->id_peminjam = auth()->id();
        $pinjam_buku->tanggal_pinjam = now();
        $pinjam_buku->tanggal_kembali = now();
        $pinjam_buku->save();

        return redirect()->route('pinjam.index')->with('success', 'Buku berhasil dipinjam.');
    }else {
        return redirect()->route('pinjam.index')->with('error', 'Buku tidak tersedia untuk dipinjam.');
    }
    }
}
