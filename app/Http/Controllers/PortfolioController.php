<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::paginate(10);
        return view('portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        $categories = PortfolioCategory::all();
        return view('portfolios.create',compact('categories'));
    }

    public function store(Request $request)
    {
        dd($request);
        // Formdan olingan ma'lumotlarni saqlash
        Portfolio::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'link' => $request->input('link'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect()->route('portfolios.index')->with('success', 'Portfolio qo\'shildi!');
    }

    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolios.show', compact('portfolio'));
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        // Formdan olingan ma'lumotlarni yangilash
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'link' => $request->input('link'),
            'category_id' => $request->input('category_id'),
        ]);

        return redirect('/portfolios')->with('success', 'Portfolio yangilandi!');
    }

    public function destroy($id)
    {
        // Portfolio o'chirish
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect('/portfolios')->with('success', 'Portfolio o\'chirildi!');
    }
}
