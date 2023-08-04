<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use App\Models\AdsManager;
use App\Models\AdsTracking;
use App\Models\User;
use App\Notifications\GeneralNotification;
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

    public static function notify_user($options = [])
    {
        $options = array_merge([
            'user_id' => '',
            'content' => [],
            'action_url' => "",
            'methods' => ['database'],
            'image' => "",
            'btn_text' => "Show"
        ], $options);

        $user = User::where('id', $options['user_id'])->first();

        if ($user != null) {
            User::where('email', $user->email)->first()->notify(
                (new GeneralNotification())
                    ->setContent($options['content'])
                    ->setMethods($options['methods'])
                    ->setActionUrl($options['action_url'])
                    ->setActionText($options['btn_text'])
                    ->setActionText($options['image'])
            );
        }
    }
}
