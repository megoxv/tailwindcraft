<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AdsTracking;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin-read',   ['only' => ['show', 'index']]);
    }

    public function index()
    {
        $users = User::count();
        $active_users = User::where('status', 1)->count();
        $banned_users = User::where('status', 0)->count();
        $posts =  Post::count();
        $totalClicks = AdsTracking::sum('totalClicks');
        $totalClicksToday = AdsTracking::whereDate('created_at', Carbon::today())->sum('totalClicks');
        $totalClicksYesterday = AdsTracking::whereDate('created_at', Carbon::yesterday())->sum('totalClicks');
        $totalClicks7Days = AdsTracking::whereBetween(DB::raw('DATE(created_at)'), [Carbon::today()->subDays(7), Carbon::today()])->sum('totalClicks');
        $totalClicksThisMonth = AdsTracking::whereMonth('created_at', Carbon::now()->month)->sum('totalClicks');


        return view('admin.index', compact('users', 'active_users', 'banned_users', 'posts', 'totalClicks', 'totalClicksToday', 'totalClicksYesterday', 'totalClicks7Days', 'totalClicksThisMonth'));
    }

    public function cleanCache()
    {
        Artisan::call('cache:clear');

        toast()->success(__('main.successfully') . ' ' . __('main.cleared_cache'))->push();
        return redirect()->back();
    }

    public function sitemapGenerate()
    {
        Artisan::call('sitemap:generate');

        toast()->success(__('main.successfully') . ' ' . __('main.sitemap_generate'))->push();
        return redirect()->back();
    }
}
