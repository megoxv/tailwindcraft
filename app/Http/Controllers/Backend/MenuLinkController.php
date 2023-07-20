<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MenuLink;
use Illuminate\Http\Request;

class MenuLinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:menu-links-create', ['only' => ['create', 'store']]);
        $this->middleware('can:menu-links-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:menu-links-update',   ['only' => ['edit', 'update']]);
        $this->middleware('can:menu-links-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $menuLinks = MenuLink::where(function ($q) use ($request) {
            if ($request->menu_id != null)
                $q->where('menu_id', $request->menu_id);
            if ($request->id != null)
                $q->where('id', $request->id);
        })->orderBy('id', 'DESC')->paginate(100);

        return view('admin.menus-links.index', compact('menuLinks'));
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
            'menu_id' => "required|exists:menus,id",
            'title' => "required",
            'type' => "nullable|in:CUSTOM_LINK,PAGE,CATEGORY",
            'type_id' => "nullable|integer",
            'url' => "required_if:type,CUSTOM_LINK",
            'icon' => "nullable",
        ]);

        MenuLink::create([
            'menu_id' => $request->menu_id,
            'title' => $request->title,
            'type' => $request->type,
            'type_id' => $request->type_id,
            'icon' => $request->icon,
            'url' => $request->url
        ]);

        toast()->success(__('main.created_successfully'))->push();
        return redirect()->route('admin.menu-links.index', ['menu_id' => $request->menu_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MenuLink  $menuLink
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuLink $menuLink)
    {
        $request->validate([
            'menu_id' => "required|exists:menus,id",
            'title' => "required",
            'type' => "nullable|in:CUSTOM_LINK,PAGE,CATEGORY",
            'type_id' => "nullable|integer",
            'url' => "required_if:type,CUSTOM_LINK",
            'icon' => "nullable",
        ]);

        $menuLink->update([
            'menu_id' => $request->menu_id,
            'title' => $request->title,
            'type' => $request->type,
            'type_id' => $request->type_id,
            'icon' => $request->icon,
            'url' => $request->url
        ]);

        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->route('admin.menu-links.index', ['menu_id' => $request->menu_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MenuLink  $menuLink
     * @return \Illuminate\Http\Response
     */
    public function destroy(MenuLink $menuLink)
    {
        $menu_id = $menuLink->menu_id;
        $menuLink->delete();

        toast()->success(__('main.deleted_successfully'))->push();
        return redirect()->route('admin.menu-links.index', ['menu_id' => $menu_id]);
    }

    public function order(Request $request)
    {
        if (!auth()->user()->can('menu-links-update')) abort(403);
        foreach ($request->order as $key => $value) {
            MenuLink::where('id', $value)->update(['order' => $key]);
        }
    }

    public function getType(Request $request)
    {
        if (!auth()->user()->can('menu-links-read')) abort(403);
        //dd($request->all());
        // if($request->type=="PAGE")
        //     return \App\Models\Page::where(function($q)use($request){
        //         if($request->id!=null)
        //             $q->where('id',$request->id);
        //     })->orderBy('id','DESC')->get();
        // if($request->type=="CATEGORY")
        //     return \App\Models\Category::where(function($q)use($request){
        //         if($request->id!=null)
        //             $q->where('id',$request->id);
        //     })->orderBy('id','DESC')->get();
    }
}
