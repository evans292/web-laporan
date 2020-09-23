<?php

namespace App\Http\Controllers;

use App\Report;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ReportRequest;

class PdfController extends Controller
{
    //
    public function index()
    {
        return view('admin.export');
    }

    public function preview(Request $request)
    {
        $from = $request->tgl1;
        $to = $request->tgl2;

        $datas = Report::whereBetween('created_at', [$from, $to])->get();
        return view('admin.preview', compact('datas', 'from', 'to'));
    }

    public function cetak_pdf(Request $request)
    {
        $from = $request->tgl1;
        $to = $request->tgl2;
        $datas = Report::whereBetween('created_at', [$from, $to])->get();
        $pdf = PDF::loadview('admin.printpdf', compact('datas', 'from', 'to'));
        return $pdf->download('laporan-pdf');
    }

    public function cetak_pdf_show(Request $request)
    {
        $data = Report::find($request->id_laporan);
        $pdf = PDF::loadview('admin.previewReport', compact('data'));
        return $pdf->download('laporan - ' . $data->pelapor->name . " " . $data->created_at);
    }
}
