<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:pages-create', ['only' => ['create', 'store']]);
        $this->middleware('can:pages-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:pages-update',   ['only' => ['edit', 'update']]);
        $this->middleware('can:pages-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();

        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.create');
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
            'slug' => "required|max:190|unique:pages,slug",
            'description' => "nullable|max:100000",
            'meta_title' => "nullable|max:190",
            'meta_description' => "nullable|max:10000",
            "status" => "required|in:0,1"
        ]);

        Page::create([
            'user_id' => auth()->user()->id,
            "title" => $request->title,
            "slug" => Str::slug($request->slug),
            "content" => $request->content,
            "image" => $request->image,
            "meta_title" => $request->meta_title,
            "meta_description" => $request->meta_description,
            "status" => $request->status,
        ]);

        toast()->success(__('main.created_successfully'))->push();
        return redirect()->route('admin.pages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title' => "required|max:190",
            'slug' => "required|max:190|unique:pages,slug," . $page->id,
            'description' => "nullable|max:100000",
            'meta_title' => "nullable|max:190",
            'meta_description' => "nullable|max:10000",
            "status" => "required|in:0,1"
        ]);

        $page->update([
            'user_id' => auth()->user()->id,
            "title" => $request->title,
            "slug" => Str::slug($request->slug),
            "content" => $request->content,
            "image" => $request->image,
            "meta_title" => $request->meta_title,
            "meta_description" => $request->meta_description,
            "status" => $request->status,
        ]);

        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->route('admin.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();

        toast()->success(__('main.deleted_successfully'))->push();
        return redirect()->route('admin.pages.index');
    }
}
