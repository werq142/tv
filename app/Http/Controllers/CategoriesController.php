<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function add()
    {
        return view('categories.add');
    }

    public function store()
    {
        $this->validate(request(),[
            'category_name' => 'required|max:32',
            'category_image' => 'required|mimes:png,jpeg,jpg'
        ]);
        $request = request();
        $file = $request->file('category_image');
        $image_name =  $file->store('images');
        Category::create([
            'category_name' => $request['category_name'],
            'category_image' => $image_name,
        ]);
        session()->flash(
            'message', "You added a category ".$request['category_name']."."
        );

        return redirect('/categories');
    }

    public function show()
    {
        $categories = Category::all();

        return view('categories.all', compact('categories'));
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function save(Category $category)
    {
        $this->validate(request(),[
            'category_name' => 'max:32',
            'category_image' => 'mimes:png,jpeg'
        ]);
        $request = request();
        if ($request['category_name'])
        {
            $category->category_name = $request['category_name'];
        }
        if ($request['category_image'])
        {
            File::Delete(storage_path('app/' . $category->category_image));
            $file = $request->file('category_image');
            $image_name =  $file->store('images');
            $category->category_image = $image_name;
        }
        $category->save();

        return redirect('/categories');
    }

    public function delete(Category $category)
    {
        File::Delete(storage_path('app/' . $category->category_image));
        $category->delete();

        return redirect('/categories');
    }
}
