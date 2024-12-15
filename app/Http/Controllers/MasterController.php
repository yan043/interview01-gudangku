<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

date_default_timezone_set("Asia/Makassar");

class MasterController extends Controller
{
    public function category()
    {
        return view('master.category');
    }

    public function item()
    {
        return view('master.item');
    }

    public function supplier()
    {
        return view('master.supplier');
    }
}
