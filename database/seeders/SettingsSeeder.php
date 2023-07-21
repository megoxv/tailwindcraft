<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # General
        Setting::create(['key' => 'website_name', 'value' => "Dashboard"]);
        Setting::create(['key' => 'website_url', 'value' => "https://name.com"]);
        Setting::create(['key' => 'website_email_address', 'value' => "admin@site.com"]);
        Setting::create(['key' => 'default_new_user_role', 'value' => "user"]);
        Setting::create(['key' => 'user_registration', 'value' => "1"]);
        Setting::create(['key' => 'email_verification', 'value' => "0"]);
        Setting::create(['key' => 'default_language', 'value' => "en"]);

        # Google reCaptcha v3
        Setting::create(['key' => 'recaptcha_status', 'value' => "0"]);
        Setting::create(['key' => 'recaptcha_site_key', 'value' => ""]);
        Setting::create(['key' => 'recaptcha_secret_key', 'value' => ""]);

        # Google Analytics
        Setting::create(['key' => 'analytics_status', 'value' => "0"]);
        Setting::create(['key' => 'analytics_tracking_id', 'value' => ""]);

        # SEO Configuration
        Setting::create(['key' => 'seo_title', 'value' => "Dashboard"]);
        Setting::create(['key' => 'seo_author', 'value' => "Abdelmjid Saber"]);
        Setting::create(['key' => 'seo_keywords', 'value' => ""]);
        Setting::create(['key' => 'seo_description', 'value' => ""]);
        Setting::create(['key' => 'social_title', 'value' => "Dashboard"]);
        Setting::create(['key' => 'social_description', 'value' => ""]);
        Setting::create(['key' => 'image', 'value' => ""]);
        Setting::create(['key' => 'blog_page_title', 'value' => "Blog"]);
        Setting::create(['key' => 'blog_page_description', 'value' => ""]);
        Setting::create(['key' => 'contact_page_title', 'value' => "Contact"]);
        Setting::create(['key' => 'contact_page_description', 'value' => "We'd love to talk about how we can help you."]);

        # Logo & Favicon
        Setting::create(['key' => 'light_logo', 'value' => ""]);
        Setting::create(['key' => 'dark_logo', 'value' => ""]);
        Setting::create(['key' => 'favicon', 'value' => ""]);

        # Auth

        ## Github
        Setting::create(['key' => 'github_status', 'value' => "0"]);
        Setting::create(['key' => 'github_client_id', 'value' => ""]);
        Setting::create(['key' => 'github_client_secret', 'value' => ""]);

        ## Google
        Setting::create(['key' => 'google_status', 'value' => "0"]);
        Setting::create(['key' => 'google_client_id', 'value' => ""]);
        Setting::create(['key' => 'google_client_secret', 'value' => ""]);

        ## Facebook
        Setting::create(['key' => 'facebook_status', 'value' => "0"]);
        Setting::create(['key' => 'facebook_client_id', 'value' => ""]);
        Setting::create(['key' => 'facebook_client_secret', 'value' => ""]);

        # SMTP
        Setting::create(['key' => 'smtp_host', 'value' => ""]);
        Setting::create(['key' => 'smtp_port', 'value' => ""]);
        Setting::create(['key' => 'smtp_username', 'value' => ""]);
        Setting::create(['key' => 'smtp_password', 'value' => ""]);
        Setting::create(['key' => 'smtp_sender_email', 'value' => ""]);
        Setting::create(['key' => 'smtp_sender_name', 'value' => ""]);
        Setting::create(['key' => 'smtp_encryption', 'value' => ""]);

        # Links
        Setting::create(['key' => 'phone', 'value' => ""]);
        Setting::create(['key' => 'facebook', 'value' => ""]);
        Setting::create(['key' => 'instagram', 'value' => ""]);
        Setting::create(['key' => 'telegram', 'value' => ""]);
        Setting::create(['key' => 'whatsapp', 'value' => ""]);
        Setting::create(['key' => 'twitter', 'value' => ""]);
        Setting::create(['key' => 'youtube', 'value' => ""]);
        Setting::create(['key' => 'tiktok', 'value' => ""]);
        Setting::create(['key' => 'linkedin', 'value' => ""]);
        Setting::create(['key' => 'github', 'value' => ""]);


        # Code
        Setting::create(['key' => 'header_code', 'value' => ""]);
        Setting::create(['key' => 'footer_code', 'value' => ""]);
    }
}
