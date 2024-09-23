<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function create()
    {

        return view('admin.add_category');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_name' => 'required|string',

        ]);

        Category::create($data);
        return redirect()->route('category.admin')->with(' added successfully');

    }

    public function index()
    {

        $categories = Category::get();

        return view('admin.categories', compact('categories'));
    }

    public function edit(string $id)
    {

        $category = Category::findOrFail($id);

        return view('admin.edit_category', compact('category'));
    }


    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'category_name' => 'required|string|max:100',

        ]);

        Category::where('id', $id)->update($data);

        return redirect()->route('category.admin');

    }
    

    public function destroy(Request $request, string $id)
    {

        $id = $request->id;

        Category::where('id', $id)->delete();

        return redirect()->route('category.admin');
    }

}
