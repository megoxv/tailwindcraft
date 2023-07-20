<?php

if (!function_exists('getSetting')) {
    function getSetting($key)
    {
        try {
            return App\Models\Setting::where('key', $key)->value('value');
        } catch (\Exception $e) {
            return "Error: Could not connect to database.";
        }
    }
}
