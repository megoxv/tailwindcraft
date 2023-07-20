<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class Browse extends Component
{
    use WithPagination;

    public function render()
    {
        SEOTools::setTitle(getSetting('seo_title'));
        SEOTools::setDescription(getSetting('seo_description'));
        SEOTools::opengraph()->setUrl(getSetting('website_url'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::jsonLd()->addImage(getSetting('image'));

        $posts = Post::where('status', 'Active')->paginate(10);

        return view('livewire.pages.browse', compact('posts'))->extends('layouts.app')->section('content');
    }
}
