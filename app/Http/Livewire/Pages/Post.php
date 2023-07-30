<?php

namespace App\Http\Livewire\Pages;

use App\Models\PostsLove;
use App\Models\Post as PostModel;
use App\Models\PostView;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Illuminate\Http\Request;

class Post extends Component
{
    public $slug;
    public $username;
    public $post;
    public $code;
    public $darkMode = false;

    protected $listeners = ['codeUpdated'];

    public function mount($slug, $username)
    {
        $this->slug = $slug;
        $this->username = $username;

        $post = PostModel::where('slug', $this->slug)
            ->where('status', 'Active')
            ->first();

        $this->code = $post->code;
        $this->post = $post;
    }

    public function toggleLove()
    {
        if (!auth()->user()) {
            return;
        }

        $loveButton = PostsLove::where('post_id', $this->post->id)
            ->where('user_id', auth()->user()->id)
            ->first();

        if (!$loveButton) {
            PostsLove::create([
                'post_id' => $this->post->id,
                'user_id' => auth()->user()->id,
                'love' => true
            ]);
        } else {
            $loveButton->delete();
        }

        $this->post->load('loves');
    }

    public function codeUpdated($payload)
    {
        $this->code = $payload['code'];
    }

    public function toggleMode()
    {
        $this->darkMode = !$this->darkMode;
    }

    public function render(Request $request)
    {
        $post = PostModel::where('slug', $this->slug)->where('status', 'Active')->first();

        if (!$post) {
            abort(404);
        }

        // Set the meta tags
        SEOTools::setTitle($post->name);
        SEOTools::setDescription($post->description);
        SEOTools::opengraph()->setUrl(route('post.show', ['username' => $this->username, 'slug' => $this->slug]));

        // Check if the current IP address already has a view record for this post
        $existingView = PostView::where('post_id', $post->id)
            ->where('ip_address', $request->ip())
            ->first();

        if (!$existingView) {
            // Create a new view record for the post and IP address
            PostView::create([
                'post_id' => $post->id,
                'ip_address' => $request->ip(),
            ]);

            // Increment the view count for the post
            $post->increment('views');
        }

        return view('livewire.pages.post', ['post' => $post])->extends('layouts.app')->section('content');
    }
}
