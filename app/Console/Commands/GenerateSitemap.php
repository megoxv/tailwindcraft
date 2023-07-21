<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatically Generate an XML Sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $posts = Post::where('status', 'Active')->get();
        $categories = Category::select(['slug', 'updated_at'])->get();
        $pages = Page::select(['slug', 'updated_at'])->where('status', 1)->get();

        foreach ($posts as $post) {
            $sitemap->add(Url::create($post->user->username . '/' . $post->slug)->setLastModificationDate($post->updated_at));
        }

        foreach ($categories as $category) {
            $sitemap->add(Url::create($category->slug)->setLastModificationDate($category->updated_at));
        }

        foreach ($pages as $page) {
            $sitemap->add(Url::create('/page/' . $page->slug)->setLastModificationDate($page->updated_at));
        }

        $sitemap->writeToFile(public_path('/sitemap.xml'));
    }
}
