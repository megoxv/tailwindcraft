<?php

namespace App\Http\Livewire\Pages;

use App\Models\Post;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;
use Illuminate\Support\Str;

class Create extends Component
{
    use WireToast;

    public $name;
    public $slug;
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
        'theme' => 'required',
    ];

    public function saveAsDraftOrSubmit()
    {
        // Check which button was clicked
        if ($_POST['action'] === 'saveAsDraft') {
            $this->saveAsDraft();
        } elseif ($_POST['action'] === 'submitForReview') {
            $this->submitForReview();
        }
    }

    public function updatedName()
    {
        $this->generateUniqueSlug();
    }

    public function generateUniqueSlug()
    {
        // Convert the title to a slug (remove special characters, spaces, etc.)
        $slug = Str::slug($this->name);

        // Check if the slug already exists in the database
        $count = 0;
        while (Post::where('slug', $slug)->exists()) {
            $count++;
            $slug = Str::slug($this->title) . '-' . $count; // Append a number to make it unique
        }

        $this->slug = $slug;
    }


    public function saveAsDraft()
    {
        $this->validate();

        Post::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'category_id' => $this->category,
            'theme' => $this->theme,
            'code' => $this->code,
            'status' => 'Draft',
        ]);

        toast()->success('Saved as a draft successfully')->pushOnNextPage();
        return redirect()->route('profile.show', auth()->user()->username);
    }

    public function submitForReview()
    {
        $this->validate();

        Post::create([
            'user_id' => auth()->user()->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'category_id' => $this->category,
            'theme' => $this->theme,
            'code' => $this->code,
            'status' => 'Wait',
        ]);

        toast()->success('Submitted for review successfully')->pushOnNextPage();
        return redirect()->route('profile.show', auth()->user()->username);
    }

    private function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->category = '';
        $this->theme = '';
        $this->code = '';
    }

    public function render()
    {
        return view('livewire.pages.create')->extends('layouts.app')->section('content');
    }
}
