<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ForumExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function exportExcel()
    {
        return Excel::download(new ForumExport, 'diskusfy_report.xlsx');
    }
}
