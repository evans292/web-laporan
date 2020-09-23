<?php

namespace App\Http\Controllers;

use App\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $countAllReports = Report::count();
        $countDoneReports = Report::where('status', '<span class="text-success">Selesai</span>')->count();
        $countProgressReports = Report::where('status', '<span class="text-info">Diproses</span>')->count();
        $countPendingReports = Report::where('status', '<span class="text-warning">Menunggu</span>')->count();

        return view(
            'admin.dashboard',
            [
                'countAllReports' => $countAllReports,
                'countDoneReports' => $countDoneReports,
                'countProgressReports' => $countProgressReports,
                'countPendingReports' => $countPendingReports
            ]
        );
    }
}
