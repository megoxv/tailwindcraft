<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:categories-create', ['only' => ['create', 'store']]);
        $this->middleware('can:categories-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:categories-update',   ['only' => ['edit', 'update']]);
        $this->middleware('can:categories-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => "required|max:190",
            'slug' => "required",
            'description' => "nullable|max:10000",
        ]);

        $slug = Str::slug($request->slug);
        $count = Category::where('slug', $slug)->count();

        if ($count > 0) {
            return redirect()->back()->withErrors(['slug' => __('validation.the_slug_has_already_been_taken')])->withInput();
        }

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
        ]);

        toast()->success(__('main.created_successfully'))->push();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => "required|max:190",
            'slug' => "required|unique:categories,slug," . $category->id,
            'description' => "nullable|max:10000",
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->slug),
            'description' => $request->description,
        ]);

        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->route('admin.categories.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        toast()->success(__('main.deleted_successfully'))->push();
        return redirect()->route('admin.categories.index');
    }
}
