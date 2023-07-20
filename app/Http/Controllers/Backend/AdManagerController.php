<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AdsManager;
use App\Models\AdsTracking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalClicksToday = AdsTracking::whereDate('created_at', Carbon::today())->sum('totalClicks');
        $totalClicksYesterday = AdsTracking::whereDate('created_at', Carbon::yesterday())->sum('totalClicks');
        $totalClicks7Days = AdsTracking::whereBetween(DB::raw('DATE(created_at)'), [Carbon::today()->subDays(7), Carbon::today()])->sum('totalClicks');
        $totalClicksThisMonth = AdsTracking::whereMonth('created_at', Carbon::now()->month)->sum('totalClicks');

        $adsManager = AdsManager::orderBy('enabled', 'DESC')->orderBy('name')->paginate(10);
        $totalClicks = AdsManager::sum('clicks');
        return view('admin.ad-manager.index', compact('adsManager', 'totalClicks', 'totalClicksToday', 'totalClicksYesterday', 'totalClicks7Days', 'totalClicksThisMonth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ad-manager.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (isset($request->image)) {
            $imagePath = $request->file('image')->store('image', 'public');
        }

        $ad = AdsManager::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'adType' => $request->adType,
            'body' => isset($request->body) ? $request->body : null,
            'image' => isset($imagePath) ? $imagePath : null,
            'imageUrl' => $request->imageUrl,
            'imageAlt' => $request->imageAlt,
            'enabled' => true,
            'placements' => !empty(json_decode($request->placements)[0]->selector) ? $request->placements : null,
        ]);

        toast()->success(__('main.created_successfully'))->push();
        return redirect()->route('admin.ads-manager.show', $ad->id)->with(['message' => 'Ad Created', 'color' => 'green']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdsManager  $adsManager
     * @return \Illuminate\Http\Response
     */
    public function show(AdsManager $adsManager)
    {
        return view('admin.ad-manager.show', compact('adsManager'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdsManager  $adsManager
     * @return \Illuminate\Http\Response
     */
    public function edit(AdsManager $adsManager)
    {
        return view('admin.ad-manager.edit', compact('adsManager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdsManager  $adsManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdsManager $adsManager)
    {
        $adsManager->name = $request->name;
        $adsManager->placements = $request->placements;
        if ($request->adType == 'HTML') {
            $adsManager->image = null;
            $adsManager->imageUrl = null;
            $adsManager->imageAlt = null;
            $adsManager->body = $request->body;
        } elseif ($request->adType == 'IMAGE') {
            if (isset($request->image)) {
                $imagePath = $request->file('image')->store('image', 'public');
                $adsManager->image = $imagePath;
            }

            $adsManager->imageUrl = isset($request->imageUrl) ? $request->imageUrl : null;
            $adsManager->imageAlt = isset($request->imageAlt) ? $request->imageAlt : null;
        }
        $adsManager->adType = $request->adType;

        $adsManager->save();

        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->route('admin.ads-manager.show', $adsManager->id)->with(['message' => 'Ad Edited', 'color' => 'green']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdsManager  $adsManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdsManager $adsManager)
    {
        $adsManager->delete();

        toast()->success(__('main.deleted_successfully'))->push();
        return redirect()->route('admin.ads-manager.index');
    }

    public function autoAds()
    {
        $ads = AdsManager::whereNotNull('placements')->get();
        return $ads;
    }

    // /**
    //  * Adds click count to the add
    //  */
    public function updateClicks(Request $request)
    {
        $slug = $request->get('slug');

        $ad = AdsManager::where('slug', $slug)->firstOrFail();
        $ad->clicks++;
        $ad->save();
        if (AdsTracking::whereDate('created_at', Carbon::today())->exists()) {
            $AdsTracking = AdsTracking::whereDate('created_at', Carbon::today())->first();
            $ad_clicks = json_decode($AdsTracking->ad_clicks);
            if (isset($ad_clicks->{$ad->slug})) {
                $ad_clicks->{$ad->slug}++;  //Increase clicks if already exists
            } else {
                $ad_clicks->{$ad->slug} = 1; //First click of the day
            }
            $totalClicks = $AdsTracking->totalClicks + 1;
            $AdsTracking->update([
                'ad_clicks' => json_encode($ad_clicks),
                'totalClicks' => $totalClicks
            ]);
        } else {
            AdsTracking::create([
                'totalClicks' => 1,
                'ad_clicks' => json_encode([$ad->slug => 1])
            ]);
        }
    }

    //*Enable the Ad */
    public function enable($id)
    {

        $adManager = AdsManager::where('id', $id)->first();

        $adManager->update([
            'enabled' => 1,
        ]);

        return redirect()->route('admin.ads-manager.index')->with(['message' => 'Ad Enabled', 'color' => 'green']);
    }

    //*Disable the Ad */
    public function disable($id)
    {
        $adManager = AdsManager::where('id', $id)->first();

        $adManager->update([
            'enabled' => 0,
        ]);

        toast()->success(__('main.updated_successfully'))->push();
        return redirect()->route('admin.ads-manager.index')->with(['message' => 'Ad Disabled', 'color' => 'green']);
    }
}
