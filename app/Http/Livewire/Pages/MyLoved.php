<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;

class MyLoved extends Component
{
    public $search = '';
    public $perPage = 12;

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function render()
    {
        SEOTools::setTitle('My Loved');
        SEOTools::setDescription("Explore the components you've loved. Discover a collection of components that you've liked on our platform. Engage with your favorite content and stay connected.");
        SEOTools::opengraph()->setUrl(route('my-loved.show'));
        SEOTools::opengraph()->addProperty('type', 'page');
    
        $user = auth()->user();
        $lovedPostIds = $user->loves->pluck('post_id');
    
        $query = Post::where('status', 'Active');
    
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }
    
        $posts = $query->whereIn('id', $lovedPostIds)->inRandomOrder()->paginate($this->perPage);
    
        return view('livewire.pages.my-loved', compact('posts'))->extends('layouts.app')->section('content');
    }
}
