<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;

class Edit extends Component
{
    public $post;
    public $name;
    public $description;
    public $category;
    public $theme;

    public $code;
    public $darkMode = false;

    protected $listeners = ['codeUpdated'];


    public function codeUpdated($payload)
    {
        $this->code = $payload['code'];
    }

    public function toggleMode()
    {
        $this->darkMode = !$this->darkMode;
    }

    protected $rules = [
        'name' => 'required|string|max:60',
        'description' => 'required|string|max:160',
        'category' => 'required|exists:categories,id',
        'theme' => 'required|string|in:Dark/Light,Dark,Light',
        'darkMode' => 'boolean',
    ];

    public function mount($slug)
    {
        $this->post = Post::where('slug', $slug)->firstOrFail();
        $this->name = $this->post->name;
        $this->description = $this->post->description;
        $this->category = $this->post->category_id;
        $this->theme = $this->post->theme;
        $this->code = $this->post->code;
    }

    public function updatePost()
    {
        $this->validate();

        $this->post->update([
            'name' => $this->name,
            'description' => $this->description,
            'category_id' => $this->category,
            'theme' => $this->theme,
            'code' => $this->code,
            'status' => 'Draft',
        ]);

        toast()->success('Post updated successfully')->push();
        return redirect()->route('edit.show', $this->post->slug);
    }

    public function render()
    {
        return view('livewire.pages.edit')->extends('layouts.app')->section('content');
    }
}
