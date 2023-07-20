<?php

namespace App\View\Components;

use App\Models\AdsManager;
use Illuminate\View\Component;

class AdComponent extends Component
{
    /**
     * The alert type.
     *
     * @var string
     */
    public $slug;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($slug)
    {
        $this->slug = $slug;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $ad = AdsManager::where('slug', $this->slug)->first();
        return view('components.ad-component', compact('ad'));
    }
}
