<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Usernotnull\Toast\Concerns\WireToast;

class Profile extends Component
{
    use WireToast, WithPagination;

    public $username;
    public $perPage = 12;

    public function mount($username)
    {
        $this->username = $username;
    }

    public function loadMore()
    {
        $this->perPage += 12;
    }

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
    
        if($post->user_id !==  auth()->user()->id) {
            abort(404);
        }

        $post->delete();

        toast()->success('Post deleted successfully')->push();
    }

    public function render()
    {
        $user = User::where('username', $this->username)->first();

        $posts = $user->posts()->where('status', 'Active')->latest()->paginate($this->perPage);
        $profilePosts = $user->posts()->latest()->paginate($this->perPage);

        return view('livewire.pages.profile', compact('user', 'posts', 'profilePosts'))->extends('layouts.app')->section('content');
    }
}
