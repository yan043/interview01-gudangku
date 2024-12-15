<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

date_default_timezone_set("Asia/Makassar");

class TransactionController extends Controller
{
    public function goods_receipt()
    {
        return view('transaction.goods_receipt');
    }

    public function purchase_goods()
    {
        return view('transaction.purchase_goods');
    }

    public function stock_transactions()
    {
        return view('transaction.stock_transactions');
    }
}
