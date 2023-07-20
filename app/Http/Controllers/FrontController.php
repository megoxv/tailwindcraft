<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;

class FrontController extends Controller
{
    public function page($slug)
    {
        $page = Page::where('slug', $slug)->where('status', 1)->first();

        if (!$page) {
            abort(404);
        }

        // Set the meta tags for the article
        SEOMeta::setTitle($page->meta_title)
            ->setDescription($page->meta_description)
            ->setCanonical(route('page.show', $slug));

        // Set the OpenGraph tags for the article
        OpenGraph::setTitle($page->meta_title)
            ->setDescription($page->meta_description)
            ->setUrl(route('page.show', $slug))
            ->addProperty('type', 'website')
            ->addImage($page->main_image);

        return view('front.pages.page', compact('page'));
    }
}
