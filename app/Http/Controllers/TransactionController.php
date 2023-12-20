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
            'category_id' => 'required|numeric',
            'name' => 'required|string',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'note' => 'nullable|string',
        ]);

        transaction::where('id', $id)->update($formFields);
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

        transaction::Create($formFields);
        return redirect()->route('dashboard');
    }
    public function destroy($id)
    {
        transaction::destroy($id);
        return redirect()->back();
    }
}
