<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:settings-update',   ['only' => ['index', 'update']]);
    }

    public function index()
    {
        $roles = Role::get();
        $languages = Language::where('status', 1)->get();

        return view('admin.settings.index', compact('roles', 'languages'));
    }

    public function update(Request $request)
    {
        $settings = $request->all();

        if (!empty($settings)) {
            foreach ($settings as $key => $value) {
                if (!in_array($key, ['user_registration', 'email_verification', 'recaptcha_status', 'analytics_status', 'image', 'light_logo', 'dark_logo', 'favicon']))
                    Setting::where('key', $key)->update(['value' => $value]);
            }
        }

        if ($request->filled('user_registration')) {
            $user_registration = $request->input('user_registration');
            Setting::where('key', 'user_registration')->update(['value' => $user_registration]);
        } else {
            Setting::where('key', 'user_registration')->update(['value' => 0]);
        }

        if ($request->filled('email_verification')) {
            $email_verification = $request->input('email_verification');
            Setting::where('key', 'email_verification')->update(['value' => $email_verification]);
        } else {
            Setting::where('key', 'email_verification')->update(['value' => 0]);
        }

        if ($request->filled('recaptcha_status')) {
            $recaptcha_status = $request->input('recaptcha_status');
            Setting::where('key', 'recaptcha_status')->update(['value' => $recaptcha_status]);
        } else {
            Setting::where('key', 'recaptcha_status')->update(['value' => 0]);
        }

        if ($request->filled('analytics_status')) {
            $analytics_status = $request->input('analytics_status');
            Setting::where('key', 'analytics_status')->update(['value' => $analytics_status]);
        } else {
            Setting::where('key', 'analytics_status')->update(['value' => 0]);
        }

        if ($request->filled('google_status')) {
            $google_status = $request->input('google_status');
            Setting::where('key', 'google_status')->update(['value' => $google_status]);
        } else {
            Setting::where('key', 'google_status')->update(['value' => 0]);
        }

        if ($request->filled('facebook_status')) {
            $facebook_status = $request->input('facebook_status');
            Setting::where('key', 'facebook_status')->update(['value' => $facebook_status]);
        } else {
            Setting::where('key', 'facebook_status')->update(['value' => 0]);
        }

        if ($request->filled('image')) {
            $image = $request->input('image');
            Setting::where('key', 'image')->update(['value' => $image]);
        }

        if ($request->filled('light_logo')) {
            $light_logo = $request->input('light_logo');
            Setting::where('key', 'light_logo')->update(['value' => $light_logo]);
        }

        if ($request->filled('dark_logo')) {
            $dark_logo = $request->input('dark_logo');
            Setting::where('key', 'dark_logo')->update(['value' => $dark_logo]);
        }

        if ($request->filled('favicon')) {
            $favicon = $request->input('favicon');
            Setting::where('key', 'favicon')->update(['value' => $favicon]);
        }


        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->back();
    }
}
