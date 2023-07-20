<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\MenuLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::create([
            'name' => "Footer Menu",
            'location' => "footer"
        ]);

        // Privacy Policy
        MenuLink::create([
            'menu_id' => $menu->id,
            'type' => "CUSTOM_LINK",
            'type_id' => null,
            'title' => "Privacy Policy",
            'url' =>  env("APP_URL") . '/privacy-policy',
            'order' => 2,
        ]);

        // Terms of Use
        MenuLink::create([
            'menu_id' => $menu->id,
            'type' => "CUSTOM_LINK",
            'type_id' => null,
            'title' => "Terms of Use",
            'url' => env("APP_URL") . 'terms-of-use',
            'order' => 3,
        ]);
    }
}
