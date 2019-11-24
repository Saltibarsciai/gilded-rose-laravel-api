<?php

namespace App;

use App\Shop\AgedBrie;
use App\Shop\BackstagePasses;
use App\Shop\Conjured;
use App\Shop\RandomItem;
use App\Shop\Sulfuras;

final class GildedRose
{
    private $items = [];
    private const AGED_BRIE = 'Aged Brie';
    private const BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    private const SULFURAS = 'Sulfuras, Hand of Ragnaros';
    private const CONJURED = 'Conjured';

    /**
     * GildedRose constructor.
     * @param array
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Updates quality of given item
     */
    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            switch ($item->name) {
                case self::AGED_BRIE:
                    (new AgedBrie($item))->updateQuality();
                    break;
                case self::BACKSTAGE_PASSES:
                    (new BackstagePasses($item))->updateQuality();
                    break;
                case self::SULFURAS:
                    (new Sulfuras($item))->updateQuality();
                    break;
                case self::CONJURED:
                    (new Conjured($item))->updateQuality();
                    break;
                default:
                    (new RandomItem($item))->updateQuality();
                    break;
            }
        }
    }
}

