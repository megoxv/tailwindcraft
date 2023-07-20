<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Menuitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:menus-create', ['only' => ['create', 'store']]);
        $this->middleware('can:menus-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:menus-update',   ['only' => ['edit', 'update']]);
        $this->middleware('can:menus-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::get();

        return view('admin.menus.index', compact('menus'));
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
            'location' => "required|unique:menus,location"
        ]);

        Menu::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        toast()->success(__('main.created_successfully'))->push();
        return redirect()->route('admin.menus.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name'=>"required|max:190",
            'location'=>"required|unique:menus,location,".$menu->id,
        ]);

        $menu->update([
            'name'=>$request->name,
            'location'=>$request->location,
        ]);

        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->route('admin.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        
        toast()->success(__('main.deleted_successfully'))->push();
        return redirect()->route('admin.menus.index');
    }
}
