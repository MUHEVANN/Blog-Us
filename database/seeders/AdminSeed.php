<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laratrust\Models\LaratrustRole;
class AdminSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' =>'admin',
            'email' =>'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        $user = User::create([
            'name' =>'user',
            'email' =>'user@gmail.com',
            'password' => Hash::make('user123'),
        ]);
        $admin->addRole('admin');
        $user->addRole('user');
    }
}