<?php

namespace App;

use App\shop\AgedBrie;

final class GildedRose {

    private $items = [];
    private const AGED_BRIE = 'Aged Brie';
    private const BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    private const SULFURAS = 'Sulfuras, Hand of Ragnaros';

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality() {
        foreach ($this->items as $item) {
            foreach ($this->items as $item) {
                switch ($item->name){
                    case self::AGED_BRIE:
                        (new AgedBrie($item))->updateQuality();
                        break;
                    default:
                        break;
                }
            }
            if ($item->name != self::AGED_BRIE and $item->name != self::BACKSTAGE_PASSES) {
                if ($item->quality > 0) {
                    if ($item->name != self::SULFURAS) {
                        $item->quality = $item->quality - 1;
                    } else {
                        $item->quality = 80;
                    }
                }
            } else {
                if ($item->quality < 50) {
                    if ($item->name == self::BACKSTAGE_PASSES) {
                        $item->quality = $item->quality + 1;
                        if ($item->sell_in < 11) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                        if ($item->sell_in < 6) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                    }
                }
            }

            if ($item->name != self::SULFURAS && $item->name != self::AGED_BRIE) {
                $item->sell_in = $item->sell_in - 1;
            }

            if ($item->sell_in < 0) {
                if ($item->name != self::AGED_BRIE) {
                    if ($item->name != self::BACKSTAGE_PASSES) {
                        if ($item->quality > 0) {
                            if ($item->name != self::SULFURAS) {
                                $item->quality = $item->quality - 1;
                            }
                        }
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                }
            }
        }
    }
}

