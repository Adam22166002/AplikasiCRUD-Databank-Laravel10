<?php

namespace App\Http\Controllers;

use App\Exports\DatabankExport;
use App\Models\BankModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function exportPDF()
    {
        $bank = BankModel::all();

        $pdf = PDF::loadView('export', ['data' => $bank])->setPaper('a3', 'landscape');
        return $pdf->stream();
    }

    public function exportEXCEL()
    {
        // return Excel::download(new DatabankExport, 'databank-'.Carbon::now()->timestamp.'.xlsx');
        return (new DatabankExport)->download('databank-'.Carbon::now()->timestamp.'.xlsx');
    }
}
