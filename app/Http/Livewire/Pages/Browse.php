<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class Browse extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 12;

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function mount()
    {
        SEOTools::setTitle(getSetting('seo_title'));
        SEOTools::setDescription(getSetting('seo_description'));
        SEOTools::opengraph()->setUrl(getSetting('website_url'));
        SEOTools::opengraph()->addProperty('type', 'website');
        // SEOTools::twitter()->setSite('@TailwindCraft');
        SEOTools::jsonLd()->addImage(getSetting('image'));
    }

    public function render()
    {
        $query = Post::where('status', 'Active');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $posts = $query->inRandomOrder()->paginate($this->perPage);

        return view('livewire.pages.browse', compact('posts'))->extends('layouts.app')->section('content');
    }
}
