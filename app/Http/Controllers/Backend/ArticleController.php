<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:articles-create', ['only' => ['create', 'store']]);
        $this->middleware('can:articles-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:articles-update',   ['only' => ['edit', 'update']]);
        $this->middleware('can:articles-delete',   ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        $articles =  Article::orderBy('id', 'DESC')->paginate();
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.articles.create', compact('categories'));
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
            'title' => "required|max:190",
            'slug' => "required|max:190|unique:articles,slug",
            'content' => "nullable",
            'main_image' => "nullable",
            'category_id' => "required|array",
            'category_id.*' => "required|exists:categories,id",
            'status' => "required|in:0,1",
            'meta_title' => "nullable|max:10000",
            'meta_description' => "nullable|max:10000",
        ]);

        $article = Article::create([
            'user_id' => auth()->user()->id,
            "title" => $request->title,
            "slug" => Str::slug($request->slug),
            "content" => $request->content,
            "main_image" => $request->main_image,
            "status" => $request->status == 1 ? 1 : 0,
            "meta_title" => $request->meta_title,
            "meta_description" => $request->meta_description,
        ]);

        $article->categories()->sync($request->category_id);

        toast()->success(__('main.created_successfully'))->push();
        return redirect()->route('admin.articles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articlec  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.articles.edit', compact('article', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => "required|max:190",
            'slug' => "required|max:190|unique:articles,slug," . $article->id,
            'content' => "nullable",
            'main_image' => "nullable",
            'category_id' => "required|array",
            'category_id.*' => "required|exists:categories,id",
            'status' => "required|in:0,1",
            'meta_title' => "nullable|max:10000",
            'meta_description' => "nullable|max:10000",
        ]);

        $article->update([
            'user_id' => auth()->user()->id,
            "title" => $request->title,
            "slug" => Str::slug($request->slug),
            "content" => $request->content,
            "main_image" => $request->main_image,
            "status" => $request->status == 1 ? 1 : 0,
            "meta_title" => $request->meta_title,
            "meta_description" => $request->meta_description,
        ]);

        $article->categories()->sync($request->category_id);

        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        toast()->success(__('main.deleted_successfully'))->push();
        return redirect()->route('admin.articles.index');
    }
}
