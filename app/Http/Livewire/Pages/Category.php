<?php

namespace App\Http\Livewire\Pages;

use App\Models\Category as ModelsCategory;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $category = ModelsCategory::where('slug', $this->slug)->first();

        if (!$category) {
            abort(404);
        }

        // Set the meta tags for the article
        SEOMeta::setTitle($category->title)
            ->setDescription($category->description)
            ->setCanonical(route('category.show', $category->slug));

        // Set the OpenGraph tags for the category
        OpenGraph::setTitle($category->title)
            ->setDescription($category->description)
            ->setUrl(route('category.show', $category->slug))
            ->addProperty('type', 'category');

        $posts = $category->posts()->where('status', 'Active')->inRandomOrder()->paginate(20);

        return view('livewire.pages.category', compact('category', 'posts'))->extends('layouts.app')->section('content');
    }
}
