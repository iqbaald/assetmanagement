<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'itemName' => 'Item 1',
                'itemPhoto' => 'item1.jpg',
                'conditionPercentage' => 90,
                'purchaseDate' => '2023-01-01',
                'purchasePrice' => 100000,
                'categoryId' => 1,
                'locationId' => 1,
            ],
            [
                'itemName' => 'Item 2',
                'itemPhoto' => 'item2.jpg',
                'conditionPercentage' => 80,
                'purchaseDate' => '2023-02-01',
                'purchasePrice' => 150000,
                'categoryId' => 2,
                'locationId' => 1,
            ],
        ];

        foreach ($data as $item) {
            Item::create($item);
        }
    }
}
