<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'lintang prayogo',
            'username' => 'lintang',
            'email' => 'lintangprayogo12@gmail.com',
            'password' => Hash::make("12345678"),
            'user_type' => 'admin',
            'login_enabled' => true,
            'profile_image' => 'https://placehold.jp/150x150.png',
            'phone' => '+628123456789',
            'address' => 'Jl. Contoh No. 1',
            'company_id' => 1,
            'role_id' => 1

        ]);

        User::factory()->create([
            'name' => 'Maya User',
            'username' => 'maya',
            'email' => 'maya@fic20.com',
            'password' => Hash::make('12345678'),
            'user_type' => 'employee',
            'login_enabled' => true,
            'profile_image' => 'https://placehold.jp/150x150.png',
            'phone' => '+628123356389',
            'address' => 'Jl. Contoh No. 2',
            'company_id' => 1,
            'role_id' => 2
        ]);
    }
}
