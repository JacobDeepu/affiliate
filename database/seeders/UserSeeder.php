<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@admin.com',
            'referral_token' => 'superadm',
        ]);

        $user->assignRole('Super Admin');

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'referral_token' => 'adminref',
        ]);

        $user->assignRole('Admin');
    }
}
