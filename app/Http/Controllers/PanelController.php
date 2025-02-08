<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
    // Menampilkan halaman dashboard dengan data (jika diperlukan)
    public function index()
    {
        $data = [
            'totalUsers' => DB::table('penggunas')->count(),
            'totalDiskusi' => DB::table('diskusis')->count(),
            'totalKomentar' => DB::table('balasans')->count(),
            'totalKategori' => DB::table('kategoris')->count(),
            'totalVotes' => DB::table('votes')->count(),
            'latestDiscussion' => DB::table('diskusis')->orderBy('created_at', 'desc')->first(),
        ];

        // Misalnya, jika file view Anda bernama welcomeAdmin.blade.php
        return view('welcomeAdmin', $data);
    }

    // Endpoint untuk mengembalikan data statistik dashboard dalam format JSON
    public function stats()
    {
        $data = [
            'totalUsers' => DB::table('penggunas')->count(),
            'totalDiskusi' => DB::table('diskusis')->count(),
            'totalKomentar' => DB::table('balasans')->count(),
            'totalKategori' => DB::table('kategoris')->count(),
            'totalVotes' => DB::table('votes')->count(),
            'latestDiscussion' => DB::table('diskusis')->orderBy('created_at', 'desc')->first(),
        ];

        return response()->json($data);
    }
}
