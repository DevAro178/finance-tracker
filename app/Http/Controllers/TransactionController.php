<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Category;
use Nette\Utils\DateTime;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $context = [
            'categories' => Category::all(),
            'accounts' => Account::all(),
        ];
        return view('transaction.index', $context);
    }

    public function show()
    {
        $currentDate = date('Y-m');
        $context = [
            'transactions' => Transaction::where('date', 'like', '%' . $currentDate . '%')->get(),
        ];
        return view('transaction.show', $context);
    }

    public function single($id)
    {
        $context = [
            'transaction' => Transaction::find($id),
        ];
        return view('transaction.single', $context);
    }

    public function filtered($month)
    {
        $date = new DateTime($month);
        $formattedDate = $date->format('Y-m');
        $context = [
            'transactions' => Transaction::where('date', 'like', '%' . $formattedDate . '%')->get(),
        ];
        return view('transaction.ul', $context);
    }
    public function edit($id)
    {
        $context = [
            'transaction' => Transaction::find($id),
            'categories' => Category::all(),
            'accounts' => Account::all(),
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

        $transaction = Transaction::find($id);

        if ($transaction->impact === 'down') {
            $additionalFields = $request->validate([
                'category_id' => 'required|numeric',
            ]);
            $formFields = array_merge($formFields, $additionalFields);
        }

        if (isset($formFields['account_id'])) {
            if ($transaction->account_id != $formFields['account_id']) {
                $account = Account::find($transaction->account_id);
                $account->balance = $account->balance + $transaction->amount;
                $account->save();

                $account = Account::find($formFields['account_id']);
                $account->balance = $account->balance - $formFields['amount'];
                $account->save();
            } else {
                $account = Account::find($transaction->account_id);
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
        $transaction = Transaction::Create($formFields);

        $account = Account::find($transaction->account_id);
        $account->balance = $account->balance - $transaction->amount;
        $account->save();

        return redirect()->route('dashboard');
    }
    public function destroy($id)
    {
        $transaction = Transaction::find($id);

        $account = Account::find($transaction->account_id);
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
            'categories' => Category::all(),
            'accounts' => Account::all(),
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
        $transaction = Transaction::Create($formFields);

        $account = Account::find($transaction->account_id);
        $account->balance = $account->balance + $transaction->amount;
        $account->save();

        return redirect()->route('dashboard');
    }
}
