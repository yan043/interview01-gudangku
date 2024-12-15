<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

date_default_timezone_set("Asia/Makassar");

class ReportController extends Controller
{
    public function stock_report()
    {
        return view('report.stock_report');
    }

    public function purchase_report()
    {
        return view('report.purchase_report');
    }

    public function acceptance_report()
    {
        return view('report.acceptance_report');
    }
}
