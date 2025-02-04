<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskusi; // Pastikan model Diskusi ada

class DashboardController extends Controller
{
    // Fungsi untuk menampilkan dashboard
    public function index()
    {
        // Mengambil data diskusi
        $diskusis = Diskusi::all(); // Atau dengan pagination

        // Mengirim data ke view dashboard
        return view('welcome', compact('diskusis'));
    }
}
