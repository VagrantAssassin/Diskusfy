<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanelController extends Controller
{
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
        return view('welcomeAdmin', $data);
    }
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
