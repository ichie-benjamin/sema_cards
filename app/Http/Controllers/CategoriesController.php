<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories', compact('categories'));
    }


    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success_message', 'Category was successfully deleted.');

    }


    public function store(Request $request)
    {

        $data = $this->getData($request);

        Category::create($data);

        return redirect()->back()->with('success_message', 'Category was successfully added.');

    }


    protected function getData(Request $request)
    {
        $rules = [
            'name' => 'string|min:1|max:255|nullable',
            'name_ar' => 'string|min:1|max:255|nullable',
        ];

        $data = $request->validate($rules);

        return $data;
    }

}
