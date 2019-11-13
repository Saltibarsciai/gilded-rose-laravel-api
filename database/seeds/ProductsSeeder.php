<?php

use App\GildedRose;
use App\Item;
use App\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    private const AGED_BRIE = 'Aged Brie';
    private const BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    private const SULFURAS = 'Sulfuras, Hand of Ragnaros';
    private const CONJURED = 'Conjured';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $items = [];
        for($i = 0; $i < 20; $i++){
            $items[] = new Item(
                $faker->randomElement([
                    self::AGED_BRIE,
                    self::BACKSTAGE_PASSES,
                    self::SULFURAS,
                    self::CONJURED,
                    $faker->text(10)
                ]),
                $faker->numberBetween(-10, 20),
                $faker->numberBetween(0, 50));
        }

        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        foreach ($items as $item){
            Product::create([
                'name' => $item->name,
                'sell_in' => $item->sell_in,
                'quality' => $item->quality
            ]);
        }
    }
}
