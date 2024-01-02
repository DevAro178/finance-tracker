<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;

class interAccount extends Controller
{
    public function index()
    {
        $context = [
            'accounts' => Account::where('user_id', auth()->user()->id)->get(),
        ];
        return view('interAccount.index', $context);
    }
    public function makeTransaction(Request $request)
    {
        $formFields = $request->validate([
            'from' => 'required',
            'to' => 'required',
            'amount' => 'required',
            'fee' => 'required',
        ]);
        $from_account = Account::where('id', $formFields['from'])->first();
        $to_account = Account::where('id', $formFields['to'])->first();
        $from_account->balance = $from_account->balance - $formFields['amount'];
        $to_account->balance = $to_account->balance + $formFields['amount'];
        $from_account->save();
        $to_account->save();
        // Creating a transaction for the fee deducted at transfer
        $category_id = Category::where('name', 'Inter Account')->first()->id;
        $transaction = new Transaction;
        $transaction->account_id = $formFields['from'];
        $transaction->category_id = $category_id;
        $transaction->date = date('Y-m-d');
        $transaction->name = 'Inter Account Transfer';
        $transaction->amount = $formFields['fee'];
        $transaction->note = 'Transfer to ' . $to_account->name . ' from ' . $from_account->name;
        $transaction->impact = 'down';
        $transaction->save();
        return redirect()->route('dashboard');
    }
}
