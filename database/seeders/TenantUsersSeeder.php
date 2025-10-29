<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TenantUsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Tenant Admin',
            'email' => 'admin@tenant.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin',
        ]);
    }
}
