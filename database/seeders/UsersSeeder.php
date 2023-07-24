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
        $existingUser = User::where('username', 'admin')->first();

        if (!$existingUser) {
            $user = User::create([
                'name' => "Admin",
                'username' => "admin",
                'email' => 'admin@admin.com',
                'email_verified_at' => date("Y-m-d h:i:s"),
                'password' => bcrypt('password')
            ]);

            $user->syncRoles(1);
        }

        User::factory()->count(50)->create();
    }
}
