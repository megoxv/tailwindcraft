<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:posts-create', ['only' => ['create', 'store']]);
        $this->middleware('can:posts-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:posts-update',   ['only' => ['edit', 'update']]);
        $this->middleware('can:posts-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::get();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $categories = Category::orderBy('id', 'DESC')->get();
        // return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => "required|max:190",
        //     'slug' => "required|max:190|unique:posts,slug",
        //     'description' => "required",
        //     'code' => "required",
        //     'category_id' => "required|exists:categories,id",
        //     'status' => "required",
        //     'theme' => "required",
        // ]);

        // Post::create([
        //     'user_id' => auth()->user()->id,
        //     "name" => $request->name,
        //     "slug" => Str::slug($request->slug),
        //     "description" => $request->description,
        //     "code" => $request->code,
        //     "category_id" => $request->category_id,
        //     "status" => $request->status,
        //     "theme" => $request->theme,
        // ]);


        // toast()->success(__('main.created_successfully'))->push();
        // return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => "required|max:190",
            'slug' => "required|max:190|unique:posts,slug," . $post->id,
            'description' => "required",
            'category_id' => "required|exists:categories,id",
            'status' => "required",
            'theme' => "required",
        ]);

        $post->update([
            "name" => $request->name,
            "slug" => Str::slug($request->slug),
            "description" => $request->description,
            "category_id" => $request->category_id,
            "status" => $request->status,
            "theme" => $request->theme,
        ]);

        Artisan::call('sitemap:generate');

        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->route('admin.posts.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        toast()->success(__('main.deleted_successfully'))->push();
        return redirect()->route('admin.posts.index');
    }
}
