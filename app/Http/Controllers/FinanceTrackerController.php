<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FinanceTrackerController extends Controller
{
    public function index()
    {
        return response("adasdsd", 200)->header('content-type', 'text/plain');
    }
}
