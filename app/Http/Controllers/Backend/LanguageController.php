<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguageController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:languages-create', ['only' => ['create', 'store']]);
        $this->middleware('can:languages-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:languages-update',   ['only' => ['edit', 'update']]);
        $this->middleware('can:languages-delete',   ['only' => ['delete']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Languages = Language::orderby('id', 'asc')->get();
        return view('admin.languages.index', compact('Languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'code' => 'required',
            'icon' => 'required',
            'direction' => 'required',
            'status' => 'required'
        ]);

        $code = trim(strtolower(substr($request->code, 0, 2)));

        $success = false;
        $Language = Language::where("code", $code)->first();
        if (!empty($Language)) {
            return redirect()->back();
        }
            // Generate Lang files
            if ($code == "en") {
                $success = true;
            } else {
                $success = \File::copyDirectory(base_path("lang/en"), base_path("lang/$code"));
            }
            if (!$success) {
                return redirect()->back();
            }
                $Language = new Language;
                $Language->name = $request->name;
                $Language->code = $code;
                $Language->icon = trim(strtolower($request->icon));
                $Language->direction = $request->direction;
                $Language->status = ($request->status) ? 1 : 0;
                $Language->created_by = Auth::user()->id;
                $Language->save();
                
                toast()->success(__('main.created_successfully'))->push();
                return redirect()->route('admin.languages.index');
            
        
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'direction' => 'required',
            'status' => 'required'
        ]);

        $language->update([
            "name" => $request->name,
            "direction" => $request->direction,
            "icon" => $request->icon,
            "status" => $request->status,
            "updated_by" => Auth::user()->id,
        ]);

        toast()->success(__('main.updated_successfully'))->push();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $language = Language::find($language->id);

        if ($language->code == "en") {
            $success = true;
        } else {
            $success = \File::deleteDirectory(base_path("lang/" . $language->code));
        }
        if ($success) {
            $language->delete();
            toast()->success(__('main.deleted_successfully'))->push();
            return redirect()->back();
        }
    }
}
