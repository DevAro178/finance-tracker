<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
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
        $context = [
            'accounts' => Account::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get(),
            'categories' => Category::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get(),
        ];
        return view('finance.settings', $context);
    }
    public function billing()
    {
        return view('finance.billing');
    }
}
