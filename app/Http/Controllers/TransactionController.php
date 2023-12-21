<?php

namespace App\Http\Controllers;

use App\Models\account;
use App\Models\category;
use Nette\Utils\DateTime;
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
        $currentDate = date('Y-m');
        $context = [
            'transactions' => transaction::where('date', 'like', '%' . $currentDate . '%')->get(),
        ];
        return view('transaction.show', $context);
    }

    public function single($id)
    {
        $context = [
            'transaction' => transaction::find($id),
        ];
        return view('transaction.single', $context);
    }

    public function filtered($month)
    {
        $date = new DateTime($month);
        $formattedDate = $date->format('Y-m');
        $context = [
            'transactions' => transaction::where('date', 'like', '%' . $formattedDate . '%')->get(),
        ];
        return view('transaction.ul', $context);
    }
    public function edit($id)
    {
        $context = [
            'transaction' => transaction::find($id),
            'categories' => category::all(),
            'accounts' => account::all(),
        ];
        return view('transaction.edit', $context);
    }
    public function update(Request $request, $id)
    {
        $formFields = $request->validate([
            'account_id' => 'required|numeric',
            'name' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        $transaction = transaction::find($id);

        if ($transaction->impact === 'down') {
            $additionalFields = $request->validate([
                'category_id' => 'required|numeric',
            ]);
            $formFields = array_merge($formFields, $additionalFields);
        }

        if (isset($formFields['account_id'])) {
            if ($transaction->account_id != $formFields['account_id']) {
                $account = account::find($transaction->account_id);
                $account->balance = $account->balance + $transaction->amount;
                $account->save();

                $account = account::find($formFields['account_id']);
                $account->balance = $account->balance - $formFields['amount'];
                $account->save();
            } else {
                $account = account::find($transaction->account_id);
                $account->balance = $account->balance - $transaction->amount + $formFields['amount'];
                $account->save();
            }
        }

        $transaction->update($formFields);
        return redirect()->route('transaction');
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
        $formFields['impact'] = 'down';
        $transaction = transaction::Create($formFields);

        $account = account::find($transaction->account_id);
        $account->balance = $account->balance - $transaction->amount;
        $account->save();

        return redirect()->route('dashboard');
    }
    public function destroy($id)
    {
        $transaction = transaction::find($id);

        $account = account::find($transaction->account_id);
        if ($transaction->impact === 'down')
            $account->balance = $account->balance + $transaction->amount;
        else
            $account->balance = $account->balance - $transaction->amount;
        $account->save();

        $transaction->delete();
        return redirect()->back();
    }

    public function topupShow()
    {
        $context = [
            'categories' => category::all(),
            'accounts' => account::all(),
            'topup' => 'true',
        ];
        return view('transaction.index', $context);
    }

    public function topup(Request $request)
    {
        $formFields = $request->validate([
            'account_id' => 'required|numeric',
            'name' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'note' => 'nullable|string',
        ]);
        $formFields['impact'] = 'up';
        $transaction = transaction::Create($formFields);

        $account = account::find($transaction->account_id);
        $account->balance = $account->balance + $transaction->amount;
        $account->save();

        return redirect()->route('dashboard');
    }
}
