<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::paginate(10);
        $categoryList = Category::all();
        return view('category.index',compact('category','categoryList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string'
        ]);

        $category = $request->get('parent_id');
        $name     = $request->get('name');


        Category::create([
            'parent_id'     => $category ?? 0,
            'name'          => $name
        ]);

        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        return view('category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoryList = Category::all();
        $category = Category::find($id);
        return view('category.edit',compact('category','categoryList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => 'required|string'
        ]);

        $category = $request->get('parent_id');
        $name     = $request->get('name');


        Category::find($id)
            ->update([
                'parent_id'     => $category ?? 0,
                'name'          => $name
            ]);

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id)
            ->delete();

        return redirect()->route('category.index');
    }
}
