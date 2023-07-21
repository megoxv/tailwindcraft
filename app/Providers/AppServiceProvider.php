<?php

namespace App\Providers;

use App\Models\Language;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use PDOException;
use Spatie\Sitemap\SitemapGenerator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {        
        $data = [
            'driver'    => 'smtp',
            'host'    => getSetting('smtp_host'),
            'port'    => getSetting('smtp_port'),
            'encryption'    => getSetting('smtp_encryption'),
            'username'    => getSetting('smtp_username'),
            'password'    => getSetting('smtp_password'),
            'from'    => [
                'address' => getSetting('smtp_sender_email'),
                'name' => getSetting('smtp_sender_name')
            ]
        ];
        Config::set('mail', $data);

        $data_github = [
            'client_id' => getSetting('github_client_id'),
            'client_secret' => getSetting('github_client_secret'),
            'redirect' => env('APP_URL') . '/auth/github/callback'
        ];

        Config::set('services.github', $data_github);

        $data_google = [
            'client_id' => getSetting('google_client_id'),
            'client_secret' => getSetting('google_client_secret'),
            'redirect' => env('APP_URL') . '/auth/google/callback'
        ];

        Config::set('services.google', $data_google);

        $data_facebook = [
            'client_id' => getSetting('facebook_client_id'),
            'client_secret' => getSetting('facebook_client_secret'),
            'redirect' => env('APP_URL') . '/auth/facebook/callback'
        ];

        Config::set('services.facebook', $data_facebook);

        $seo_website = [
            'title' => getSetting('website_name'),
            'description' => getSetting('seo_description'),
            'keywords' => getSetting('seo_keywords'),
            'site_name' => getSetting('website_name'),
        ];

        Config::set('seotools.meta.defaults', $seo_website);

        $social_seo = [
            'title' => getSetting('social_title'),
            'description' => getSetting('social_description'),
            'site_name' => getSetting('website_name'),
            'images' => [getSetting('image')],
        ];

        Config::set('seotools.opengraph.defaults', $social_seo);
        Config::set('seotools.json-ld.defaults', $social_seo);

        Config::set('app.locale', getSetting('default_language') );
        Config::set('app.fallback_locale', getSetting('default_language') );
    }
}
