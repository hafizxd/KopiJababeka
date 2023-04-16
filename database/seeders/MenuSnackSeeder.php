<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSnackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'Menu-ID' => 'MN29',
                'Product-Name' => 'Donut/pcs',
                'Product-Type' => 'Snack',
                'Product-Price' => 8000,
            ],
            [
                'Menu-ID' => 'MN30',
                'Product-Name' => 'Croffle/porsi (isi 4)',
                'Product-Type' => 'Snack',
                'Product-Price' => 30000,
            ]
        ];

        collect($menus)->each(function ($menu) { Menu::create($menu); });
    }
}
