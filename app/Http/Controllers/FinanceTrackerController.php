<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
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
        $today = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        $accounts = Account::where('user_id', auth()->user()->id)->get();
        $data_accounts = $accounts->slice(0, 3);

        $today_transactions = [];
        $yesterday_transactions = [];

        foreach ($accounts as $account) {
            $transactions = $account->transaction()->get();
            $today_transactions = array_merge($today_transactions, $transactions->where('date', $today)->toArray());
            $yesterday_transactions = array_merge($yesterday_transactions, $transactions->where('date', $yesterday)->toArray());
        }

        $context = [
            'today_transactions' => $today_transactions,
            'yesterday_transactions' => $yesterday_transactions,
            'accounts' => $data_accounts,
        ];

        return view('finance.billing', $context);
    }
}
