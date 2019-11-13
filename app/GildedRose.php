<?php

namespace App;

use App\shop\AgedBrie;
use App\shop\BackstagePasses;
use App\shop\Conjured;
use App\shop\RandomItem;
use App\shop\Sulfuras;

final class GildedRose
{
    private $items = [];
    private const AGED_BRIE = 'Aged Brie';
    private const BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    private const SULFURAS = 'Sulfuras, Hand of Ragnaros';
    private const CONJURED = 'Conjured';

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function updateQuality()
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

