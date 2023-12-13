<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceTrackerController extends Controller
{
    public function index()
    {
        return view('finance.dashboard');
    }
    public function profile()
    {
        return view('finance.profile');
    }
    public function settings()
    {
        return view('finance.settings');
    }
    public function addAccount()
    {
        return view('finance.addAccount');
    }
}
