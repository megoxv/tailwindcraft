<?php

namespace App\Http\Livewire;

use App\Models\AdsManager;
use App\Models\AdsTracking;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdReportComponent extends Component
{
    // Report Start and End Date
    public $reportStartDate;
    public $reportEndDate;

    //Properties to show dashboard summary data
    public $totalClicksToday = 0;
    public $totalClicksYesterday = 0;
    public $totalClicks7Days = 0;
    public $totalClicksThisMonth = 0;

    //Properties to create chart data
    public $clicksPerDate = [];
    public $clicksPerAd = [];

    public function render()
    {
        $this->totalClicksToday = AdsTracking::whereDate('created_at', Carbon::today())->sum('totalClicks');
        $this->totalClicksYesterday = AdsTracking::whereDate('created_at', Carbon::yesterday())->sum('totalClicks');
        $this->totalClicks7Days = AdsTracking::whereBetween(DB::raw('DATE(created_at)'), [Carbon::today()->subDays(7), Carbon::today()])->sum('totalClicks');
        $this->totalClicksThisMonth = AdsTracking::whereMonth('created_at', Carbon::now()->month)->sum('totalClicks');
        return view('livewire.ad-report-component');
    }

    public function calculateClicksReport()
    {
        $date_from = Carbon::parse($this->reportStartDate)->startOfDay();
        $date_to = Carbon::parse($this->reportEndDate)->endOfDay();
        $adTracking = AdsTracking::where('created_at', '>=', $date_from)
            ->where('created_at', '<', $date_to)
            ->get();

        //Calculate clicks per date
        $dateClicksCollection = $adTracking->mapWithKeys(function ($item, $key) {
            return [$item->created_at->format('Y-m-d') => $item->totalClicks];
        });
        $period = CarbonPeriod::create($this->reportStartDate, $this->reportEndDate);
        $result = collect();
        foreach ($period as $p) {
            if ($dateClicksCollection->has($p->format('Y-m-d'))) {
                $result[$p->format('Y-m-d')] = $dateClicksCollection->get($p->format('Y-m-d'));
            } else {
                $result[$p->format('Y-m-d')] = 0;
            }
        }
        $this->clicksPerDate = $result->toArray();

        //Calculate clicks per ad in the given period
        $adClicksCollection = $adTracking->map(function ($item, $key) {
            return json_decode($item['ad_clicks'], true);
        });


        $ads = AdsManager::all();
        foreach ($ads as $ad) {
            array_push($this->clicksPerAd, ['name' => $ad->name,  'clicks' => $adClicksCollection->sum($ad->slug)]);
        }

        $this->clicksPerAd = collect($this->clicksPerAd)->sortByDesc('clicks')->values()->all();

        $this->emit('renderChart');
    }
}
