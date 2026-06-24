<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@salahport.com'],
            [
                'name' => 'SalahPort Admin',
                'password' => 'password',
                'is_admin' => true,
            ],
        );
    }
}
