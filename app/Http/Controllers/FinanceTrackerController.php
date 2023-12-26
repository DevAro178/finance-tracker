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
        // Categories
        $categories = Category::where('user_id', auth()->user()->id)->get();
        // Accounts
        $accounts = Account::where('user_id', auth()->user()->id)->get();
        $current_Accounts = Account::where('user_id', auth()->user()->id)->where('type', 'current')->get();
        $saving_Accounts = Account::where('user_id', auth()->user()->id)->where('type', 'saving')->get();
        // Calculations
        $spentPerMonth = [];
        for ($i = 0; $i < 12; $i++) {
            $month = date('Y-m', strtotime("-$i month"));
            $spent = 0;
            foreach ($current_Accounts as $current_Account) {
                $transactions = $current_Account->transaction()->where('date', 'like', $month . '%')->get();
                foreach ($transactions as $transaction) {
                    $spent += $transaction->amount;
                }
            }
            $spentPerMonth[] = $spent;
        }
        $spentPerMonth = array_reverse($spentPerMonth);
        $spent = $spentPerMonth[date('n') - 1];
        $spentPerMonthString = implode(", ", $spentPerMonth);

        $remaining = $current_Accounts->sum('balance');
        $total_Income = $spent + $remaining;
        $savings = $saving_Accounts->sum('balance');
        $context = [
            'spent' => number_format($spent, 2),
            'remaining' => number_format($remaining, 2),
            'total_Income' => number_format($total_Income, 2),
            'savings' => number_format($savings, 2),
            'spentPerMonthString' => $spentPerMonthString,
            'accounts' => $accounts,
            'categories' => $categories,
        ];
        return view('finance.dashboard', $context);
    }
    public function profile()
    {
        $user = auth()->user();
        $context = [
            'user' => $user,
        ];

        return view('finance.profile', $context);
    }
    public function profileUpdate(Request $request)
    {
        // dd($request->all());
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'bio' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'postalcode' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('picture')) {
            $formFields['picture'] = $request->file('picture')->store('pictures', 'public');
        }

        if ($request->hasFile('bgimage')) {
            $formFields['bgimage'] = $request->file('bgimage')->store('bgimage', 'public');
        }

        $user = auth()->user();
        $user->update($formFields);
        $user->save();

        return redirect()->back();
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
