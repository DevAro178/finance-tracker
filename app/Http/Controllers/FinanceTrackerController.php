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



    // Account Routes
    public function addAccount()
    {
        return view('finance.addAccount');
    }
    public function editAccount()
    {
        $context = [
            'account' => Account::find(request()->route('id')),
        ];
        return view('finance.editAccount', $context);
    }
    public function storeAccount(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required'],
            'balance' => ['required', 'numeric'],
        ]);

        $formFields['user_id'] = auth()->user()->id;
        $account = Account::Create($formFields);
        return redirect()->route('settings')->with('message', 'Account added successfully');
    }
    public function updateAccount(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required'],
            'balance' => ['required', 'numeric'],
        ]);
        $account = Account::find(request()->route('id'));
        $account->update($formFields);
        return redirect()->route('settings')->with('message', 'Account updated successfully');
    }
    public function deleteAccount()
    {
        $account = Account::find(request()->route('id'));
        $account->delete();
        return redirect()->route('settings')->with('message', 'Account deleted successfully');
    }



    // Category Routes
    public function addCategory()
    {
        return view('finance.addCategory');
    }
    public function storeCategory(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric'],
        ]);

        $formFields['user_id'] = auth()->user()->id;
        $category = Category::Create($formFields);
        return redirect()->route('settings')->with('message', 'Category added successfully');
    }
    public function editCategory()
    {
        $context = [
            'category' => Category::find(request()->route('id')),
        ];
        return view('finance.editCategory', $context);
    }
    public function updateCategory(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric'],
        ]);
        $category = Category::find(request()->route('id'));
        $category->update($formFields);
        return redirect()->route('settings')->with('message', 'Category updated successfully');
    }
    public function deleteCategory()
    {
        $category = Category::find(request()->route('id'));
        $category->delete();
        return redirect()->route('settings')->with('message', 'Category deleted successfully');
    }
}
