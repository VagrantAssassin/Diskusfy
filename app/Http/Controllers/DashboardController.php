<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskusi;

class DashboardController extends Controller
{
    public function index()
    {
        $diskusis = Diskusi::all();

        return view('welcome', compact('diskusis'));
    }
}
