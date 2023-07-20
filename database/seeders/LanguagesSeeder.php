<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Language = new Language;
        $Language->name = "English";
        $Language->code = "en";
        $Language->direction = "ltr";
        $Language->icon = "us";
        $Language->status = 1;
        $Language->created_by = 1;
        $Language->save();

        $Language = new Language;
        $Language->name = "العربية";
        $Language->code = "ar";
        $Language->direction = "rtl";
        $Language->icon = "eg";
        $Language->status = 1;
        $Language->created_by = 1;
        $Language->save();
    }
}
