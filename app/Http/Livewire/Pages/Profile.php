<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Profile extends Component
{
    use WireToast;
    
    public $username;

    public function mount($username)
    {
        $this->username = $username;
    }

    public function deletePost($postId)
    {
        $post = Post::findOrFail($postId);
        $post->delete();

        toast()->success('Post deleted successfully')->push();
    }

    public function render()
    {
        $user = User::where('username', $this->username)->first();

        return view('livewire.pages.profile', compact('user'))->extends('layouts.app')->section('content');
    }
}
