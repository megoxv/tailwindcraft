<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $existingUser = User::where('username', 'admin')->first();

        // if ($existingUser) {

        //     User::factory()->count(100)->create();
        //     return;
        // }

        $user = User::create([
            'name' => "Admin",
            'username' => "admin",
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password')
        ]);

        $user->syncRoles(1);


        // User::factory()->count(100)->create();
    }
}
