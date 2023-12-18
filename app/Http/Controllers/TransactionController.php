<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\account;
use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $context = [
            'categories' => category::all(),
            'accounts' => account::all(),
        ];
        return view('transaction.index', $context);
    }

    public function show()
    {
        $context = [
            'transactions' => transaction::all(),
        ];
        return view('transaction.show', $context);
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'account_id' => 'required|numeric',
            'category_id' => 'required|numeric',
            'name' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        transaction::Create($formFields);
        return redirect()->route('dashboard');
    }
}
