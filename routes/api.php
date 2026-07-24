<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Part;

// Rute REST API untuk mengambil semua data inventaris
Route::get('/parts', function () {
    $parts = Part::all();
    
    return response()->json([
        'success' => true,
        'message' => 'Berhasil mengambil daftar inventaris Bebek Komputer',
        'data' => $parts
    ], 200);
});