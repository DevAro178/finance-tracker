<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceTrackerController extends Controller
{
    public function index()
    {
        return view('finance.dashboard');
    }
}
