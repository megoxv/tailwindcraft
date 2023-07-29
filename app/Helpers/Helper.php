<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use App\Models\AdsManager;
use App\Models\AdsTracking;
use Carbon\Carbon;

class Helper
{
    public function updateClicks($slug)
    {
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
}
