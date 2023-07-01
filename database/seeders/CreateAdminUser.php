<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'login' => 'admin',
            'password' => Hash::make('qweqwe'),
            'is_admin' => 1,
            'token' => null,
        ]);

        $this->command->info('Users seeded successfully.');
    }
}
