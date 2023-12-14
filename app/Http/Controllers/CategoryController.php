<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        return view('category.index');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric'],
        ]);

        $formFields['user_id'] = auth()->user()->id;
        $category = Category::Create($formFields);
        return redirect()->route('settings')->with('message', 'Category added successfully');
    }
    public function edit()
    {
        $context = [
            'category' => Category::find(request()->route('id')),
        ];
        return view('category.editCategory', $context);
    }
    public function update(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'numeric'],
        ]);
        $category = Category::find(request()->route('id'));
        $category->update($formFields);
        return redirect()->route('settings')->with('message', 'Category updated successfully');
    }
    public function destroy()
    {
        $category = Category::find(request()->route('id'));
        $category->delete();
        return redirect()->route('settings')->with('message', 'Category deleted successfully');
    }
}
