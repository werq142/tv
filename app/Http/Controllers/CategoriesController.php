<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'category_name' => 'required|max:32',
            'category_image' => 'required|mimes:png,jpeg,jpg'
        ]);
        $file = $request->file('category_image');
        //$image_name =  $file->store('images');
        $image_name = uniqid();
        $image_name = $image_name . '.png';
        $file->move(public_path() . '/images/categories', $image_name);
        $image_name = 'images/categories/' . $image_name;
        Category::create([
            'category_name' => $request['category_name'],
            'category_image' => $image_name,
        ]);
        session()->flash(
            'message', "You added a category " . $request['category_name'] . "."
        );

        return redirect()->action('CategoriesController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);

        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'category_name' => 'max:32',
            'category_image' => 'mimes:png,jpeg'
        ]);

        $category = Category::find($id);
        $category->category_name = $request['category_name'];

        if ($request['category_image']) {

            File::Delete(public_path($category->category_image));
            $file = $request->file('category_image');
            $image_name = uniqid();
            $image_name = $image_name . '.png';
            $file->move(public_path() . '/images/categories', $image_name);
            $image_name = 'images/categories/' . $image_name;
            $category->category_image = $image_name;
        }

        $category->save();

        return redirect()->action('CategoriesController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        File::Delete(storage_path('app/' . $category->category_image));
        $category->delete();

        return redirect()->action('CategoriesController@index');
    }
}
