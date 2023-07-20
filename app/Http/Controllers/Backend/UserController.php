<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RahulHaque\Filepond\Facades\Filepond;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users-create', ['only' => ['create', 'store']]);
        $this->middleware('can:users-read',   ['only' => ['show', 'index']]);
        $this->middleware('can:users-update',   ['only' => ['edit', 'update']]);
        $this->middleware('can:users-delete',   ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users =  User::orderBy('id', 'DESC')->paginate();
        $roles = Role::get();
        return view('admin.users.index', compact('users', 'roles'));
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
            'bio' => "nullable|max:5000",
            'status' => "required|in:0,1",
            'email' => "required|unique:users,email",
            'password' => "required|min:8|max:190",
        ]);

        $user = User::create([
            "name" => $request->name,
            "bio" => $request->bio,
            "status" => $request->status,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        if (auth()->user()->can('user-roles-update')) {
            $request->validate([
                'roles' => "required|array",
                'roles.*' => "required|exists:roles,id",
            ]);
            $user->syncRoles($request->roles);
        }

        toast()->success(__('main.created_successfully'))->push();
        return redirect()->route('admin.users.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => "nullable|max:190",
            'bio' => "nullable|max:5000",
            'status' => "required|in:0,1",
            'email' => "required|unique:users,email," . $user->id,
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'new_password' => "nullable|min:8|max:190",
        ]);

        $user->update([
            "name" => $request->name,
            "bio" => $request->bio,
            "status" => $request->status,
            "email" => $request->email,

        ]);

        if (auth()->user()->can('user-roles-update')) {
            $request->validate([
                'roles' => "required|array",
                'roles.*' => "required|exists:roles,id",
            ]);
            $user->syncRoles($request->roles);
        }

        if ($request->password != null) {
            $user->update([
                "password" => \Hash::make($request->new_password)
            ]);
        }

        if (request()->hasfile('profile_photo')) {
            $avatarName = time() . '.' . request()->profile_photo->getClientOriginalExtension();
            request()->profile_photo->storeAs(('public/profile-photos'), $avatarName);
            $user->update(['profile_photo' => 'profile-photos/' . $avatarName]);
        }

        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Storage::exists('users/' . $user->profile_photo)) {
            Storage::delete('users/' . $user->profile_photo);
        }

        $user->delete();

        toast()->success(__('main.deleted_successfully'))->push();
        return redirect()->route('admin.users.index');
    }
}
