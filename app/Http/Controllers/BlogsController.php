<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Http\Requests\StoreBlogsRequest;
use App\Http\Requests\UpdateBlogsRequest;
use App\Models\BlogsHasCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogsController extends Controller
{
    public function index()
    {
        $blogs = Blogs::paginate(10);
        $blogsList = Blogs::all();
        return view('blogs.index',compact('blogs','blogsList'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('blogs.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject'  => 'required|string',
            'desc'  => 'required'
        ]);

        $category = $request->get('subject');
        $name     = $request->get('desc');

        $blogs = Blogs::create([
            'subject'       => $category ?? "",
            'desc'          => $name
        ]);

        foreach ($request->get('category') as $cg){
            BlogsHasCategory::create([
                'category_id'   => $cg,
                'blogs_id'      => $blogs->id,
            ]);
        }

        return redirect()->route('blogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Blogs::find($id);
        return view('blogs.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blogs::find($id);
        $category = Category::all();
        return view('blogs.edit',compact('blog','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'subject'  => 'required|string',
            'desc'  => 'required'
        ]);

        $category = $request->get('subject');
        $name     = $request->get('desc');

        $blogs = Blogs::create([
            'subject'       => $category ?? "",
            'desc'          => $name
        ]);

        foreach ($request->get('category') as $cg){
            BlogsHasCategory::create([
                'category_id'   => $cg,
                'blogs_id'      => $blogs->id,
            ]);
        }

        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blogs::find($id)
            ->delete();

        return redirect()->route('blogs.index');
    }
}
