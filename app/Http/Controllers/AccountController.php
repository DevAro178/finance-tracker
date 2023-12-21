<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.addAccount');
    }
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required'],
            'balance' => ['required', 'numeric'],
        ]);
        if ($request->hasFile('icon')) {
            $formFields['icon'] = $request->file('icon')->store('icons', 'public');
        }

        $formFields['user_id'] = auth()->user()->id;
        $account = Account::Create($formFields);
        return redirect()->route('settings')->with('message', 'Account added successfully');
    }
    public function edit()
    {
        $context = [
            'account' => Account::find(request()->route('id')),
        ];
        return view('account.editAccount', $context);
    }
    public function update(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required'],
            'balance' => ['required', 'numeric'],
        ]);
        if ($request->hasFile('icon')) {
            $formFields['icon'] = $request->file('icon')->store('icons', 'public');
        }
        $account = Account::find(request()->route('id'));
        $account->update($formFields);
        return redirect()->route('settings')->with('message', 'Account updated successfully');
    }
    public function destroy()
    {
        $account = Account::find(request()->route('id'));
        $account->delete();
        return redirect()->route('settings')->with('message', 'Account deleted successfully');
    }
}
