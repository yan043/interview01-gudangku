<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

date_default_timezone_set("Asia/Makassar");

class SettingsController extends Controller
{
    public function user()
    {
        return view('settings.user');
    }

    public function level()
    {
        return view('settings.level');
    }
}
