<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'User-ID' => 'US01',
            'User-Name' => 'Barista',
            'User-Login' => 'admin',
            'Password' => Hash::make('12345678'),
        ]);
    }
}
