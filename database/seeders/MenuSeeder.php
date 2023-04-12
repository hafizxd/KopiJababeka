<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
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
                'Menu-ID' => 'MN01',
                'Product-Name' => 'Ice Coffe Lite',
                'Product-Type' => 'Drink',
                'Product-Price' => 18000,
            ],
            [
                'Menu-ID' => 'MN02',
                'Product-Name' => 'Es Kopi Susu',
                'Product-Type' => 'Drink',
                'Product-Price' => 16000,
            ],
            [
                'Menu-ID' => 'MN03',
                'Product-Name' => 'Ice Americano',
                'Product-Type' => 'Drink',
                'Product-Price' => 15000,
            ],
            [
                'Menu-ID' => 'MN04',
                'Product-Name' => 'Ice Coconut Espresso',
                'Product-Type' => 'Drink',
                'Product-Price' => 19000,
            ],
            [
                'Menu-ID' => 'MN05',
                'Product-Name' => 'Kebab',
                'Product-Type' => 'Snack',
                'Product-Price' => 20000,
            ],
            [
                'Menu-ID' => 'MN06',
                'Product-Name' => 'Kentang Goreng',
                'Product-Type' => 'Snack',
                'Product-Price' => 15000,
            ],
        ];

        collect($menus)->each(function ($menu) { Menu::create($menu); });
    }
}
