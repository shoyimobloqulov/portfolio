<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioCategoryController extends Controller
{
    public function index()
    {
        $category = PortfolioCategory::paginate(10);
        $categoryList = PortfolioCategory::all();
        return view('portfolio_category.index',compact('category','categoryList'));
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

        $name     = $request->get('name');

        PortfolioCategory::create([
            'name'          => $name
        ]);

        return redirect()->route('portfolio_category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = PortfolioCategory::find($id);
        return view('portfolio_category.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoryList = PortfolioCategory::all();
        $category = PortfolioCategory::find($id);
        return view('portfolio_category.edit',compact('category','categoryList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'  => 'required|string'
        ]);

        $name     = $request->get('name');


        PortfolioCategory::find($id)
            ->update([
                'name'          => $name
            ]);

        return redirect()->route('portfolio_category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PortfolioCategory::find($id)
            ->delete();

        return redirect()->route('portfolio_category.index');
    }
}
