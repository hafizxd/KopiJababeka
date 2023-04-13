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
                'Product-Name' => 'Kopsus Rantau',
                'Product-Type' => 'Drink',
                'Product-Price' => 24000,
            ],
            [
                'Menu-ID' => 'MN02',
                'Product-Name' => 'Kopsus Strawberry',
                'Product-Type' => 'Drink',
                'Product-Price' => 30000,
            ],
            [
                'Menu-ID' => 'MN03',
                'Product-Name' => 'Coffee Bomb',
                'Product-Type' => 'Drink',
                'Product-Price' => 24000,
            ],
            [
                'Menu-ID' => 'MN04',
                'Product-Name' => 'Adrenaline Shot',
                'Product-Type' => 'Drink',
                'Product-Price' => 24000,
            ],
            [
                'Menu-ID' => 'MN05',
                'Product-Name' => 'Four Horsemen',
                'Product-Type' => 'Drink',
                'Product-Price' => 30000,
            ],
            [
                'Menu-ID' => 'MN06',
                'Product-Name' => 'Espresso',
                'Product-Type' => 'Drink',
                'Product-Price' => 10000,
            ],
            [
                'Menu-ID' => 'MN07',
                'Product-Name' => 'Cappuccino',
                'Product-Type' => 'Drink',
                'Product-Price' => 26000,
            ],
            [
                'Menu-ID' => 'MN08',
                'Product-Name' => 'Cafe Latte',
                'Product-Type' => 'Drink',
                'Product-Price' => 25000,
            ],
            [
                'Menu-ID' => 'MN09',
                'Product-Name' => 'Americano',
                'Product-Type' => 'Drink',
                'Product-Price' => 20000,
            ],
            [
                'Menu-ID' => 'MN10',
                'Product-Name' => 'Mochaccino',
                'Product-Type' => 'Drink',
                'Product-Price' => 28000,
            ],
            [
                'Menu-ID' => 'MN11',
                'Product-Name' => 'Caramel Latte',
                'Product-Type' => 'Drink',
                'Product-Price' => 28000,
            ],
            [
                'Menu-ID' => 'MN12',
                'Product-Name' => 'Pandan Latte',
                'Product-Type' => 'Drink',
                'Product-Price' => 28000,
            ],
            [
                'Menu-ID' => 'MN13',
                'Product-Name' => 'Affogato',
                'Product-Type' => 'Drink',
                'Product-Price' => 25000,
            ],
            [
                'Menu-ID' => 'MN14',
                'Product-Name' => 'Choco - cok',
                'Product-Type' => 'Drink',
                'Product-Price' => 25000,
            ],
            [
                'Menu-ID' => 'MN15',
                'Product-Name' => 'Matcha Latte',
                'Product-Type' => 'Drink',
                'Product-Price' => 25000,
            ],

            [
                'Menu-ID' => 'MN16',
                'Product-Name' => 'Oreo Latte',
                'Product-Type' => 'Drink',
                'Product-Price' => 25000,
            ],
            [
                'Menu-ID' => 'MN17',
                'Product-Name' => 'Red Velvet Latte',
                'Product-Type' => 'Drink',
                'Product-Price' => 25000,
            ],
            [
                'Menu-ID' => 'MN18',
                'Product-Name' => 'Red Velvet Latte',
                'Product-Type' => 'Drink',
                'Product-Price' => 25000,
            ],
            [
                'Menu-ID' => 'MN19',
                'Product-Name' => 'Summer Peach Tea',
                'Product-Type' => 'Drink',
                'Product-Price' => 20000,
            ],
            [
                'Menu-ID' => 'MN20',
                'Product-Name' => 'Pastry Gelato',
                'Product-Type' => 'Drink',
                'Product-Price' => 26000,
            ],
            [
                'Menu-ID' => 'MN21',
                'Product-Name' => 'V20 / Japanese Iced Coffee',
                'Product-Type' => 'Drink',
                'Product-Price' => 25000,
            ],
            [
                'Menu-ID' => 'MN22',
                'Product-Name' => 'Specialty Coffee',
                'Product-Type' => 'Drink',
                'Product-Price' => 35000,
            ],
            [
                'Menu-ID' => 'MN23',
                'Product-Name' => 'Vietnam Drip',
                'Product-Type' => 'Drink',
                'Product-Price' => 20000,
            ],
            [
                'Menu-ID' => 'MN24',
                'Product-Name' => 'Mojito',
                'Product-Type' => 'Drink',
                'Product-Price' => 23000,
            ],
            [
                'Menu-ID' => 'MN25',
                'Product-Name' => 'Bali Twillight',
                'Product-Type' => 'Drink',
                'Product-Price' => 30000,
            ],
            [
                'Menu-ID' => 'MN26',
                'Product-Name' => 'Midnight Run',
                'Product-Type' => 'Drink',
                'Product-Price' => 30000,
            ],
            [
                'Menu-ID' => 'MN27',
                'Product-Name' => 'West Coast',
                'Product-Type' => 'Drink',
                'Product-Price' => 25000,
            ],
            [
                'Menu-ID' => 'MN28',
                'Product-Name' => 'Marteani',
                'Product-Type' => 'Drink',
                'Product-Price' => 25000,
            ]
        ];

        collect($menus)->each(function ($menu) { Menu::create($menu); });
    }
}
