<?php

namespace App\Http\Livewire\Components;

use App\Models\PostsLove;
use Livewire\Component;

class Post extends Component
{
    public $post;

    public function mount($post)
    {
        $this->post = $post;
    }

    public function toggleLove()
    {
        if (auth()->user()) {
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
    }

    public function render()
    {
        return view('livewire.components.post');
    }
}
