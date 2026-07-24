<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PartController extends Controller
{
    // Menampilkan Dashboard Admin & Data Part
    public function index()
    {
        $parts = Part::all();
        $total_stok = Part::sum('stok');
        return view('admin.dashboard', compact('parts', 'total_stok'));
    }

    // Menampilkan Katalog untuk User Biasa
    public function catalog()
    {
        $parts = Part::all();
        return view('user.katalog', compact('parts'));
    }

    // Menyimpan Data Part Baru (Create)
    public function store(Request $request)
    {
        Part::create($request->all());
        return redirect()->route('admin.dashboard')->with('success', 'Part komputer berhasil ditambahkan.');
    }

    // Menghapus Data Part (Delete)
    public function destroy($id)
    {
        Part::find($id)->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Part dihapus.');
    }

    // Export Laporan PDF
    public function exportPdf()
    {
        $parts = Part::all();
        $pdf = Pdf::loadView('admin.laporan_pdf', compact('parts'));
        return $pdf->download('Laporan_Stok_Bebek_Komputer.pdf');
    }
}
