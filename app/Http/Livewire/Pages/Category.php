<?php

namespace App\Http\Livewire\Pages;

use App\Models\Category as ModelsCategory;
use Artesaos\SEOTools\Facades\SEOTools;
use Livewire\Component;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 12;

    public function loadMore()
    {
        $this->perPage += 12;
    }

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

        // Set the meta tags
        SEOTools::setTitle($category->title);
        SEOTools::setDescription($category->description);
        SEOTools::opengraph()->setUrl(route('category.show', $category->slug));
        SEOTools::opengraph()->addProperty('type', 'category');

        $query = $category->posts()->where('status', 'Active');

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('description', 'like', '%' . $this->search . '%');
            });
        }

        $posts = $query->inRandomOrder()->paginate($this->perPage);

        return view('livewire.pages.category', compact('category', 'posts'))->extends('layouts.app')->section('content');
    }
}
