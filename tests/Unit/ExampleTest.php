<?php

namespace Tests\Unit;

use App\GildedRose;
use App\Item;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    private const AGED_BRIE = 'Aged Brie';
    private const BACKSTAGE_PASSES = 'Backstage passes to a TAFKAL80ETC concert';
    private const SULFURAS = 'Sulfuras, Hand of Ragnaros';
    private const RANDOM = 'Random item';
    private const CONJURED = 'Conjured';

    public function testAgedBrieIfAddsNormally()
    {
        $items      = [new Item(self::AGED_BRIE, 10, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(2, $items[0]->quality);
        $this->assertEquals(9, $items[0]->sell_in);
    }

    public function testAgedBrieIfDoesntAddAbove50()
    {
        $items      = [new Item(self::AGED_BRIE, 10, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(50, $items[0]->quality);
        $this->assertEquals(9, $items[0]->sell_in);
    }

    public function testAgedBrieIfAddsTwiceAsMuchOnSellDate()
    {
        $items      = [new Item(self::AGED_BRIE, 0, 5)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(7, $items[0]->quality);
        $this->assertEquals(-1, $items[0]->sell_in);
    }

    public function testAgedBrieIfAddsDoubleOnAfterSellDate()
    {
        $items      = [new Item(self::AGED_BRIE, -2, 49)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(50, $items[0]->quality);
        $this->assertEquals(-3, $items[0]->sell_in);
    }


    public function testBackstageIfAddsNormally()
    {
        $items      = [new Item(self::BACKSTAGE_PASSES, 11, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(2, $items[0]->quality);
        $this->assertEquals(10, $items[0]->sell_in);
    }

    public function testBackstageIfAdds2TimesMoreWhen10Daysleft()
    {
        $items      = [new Item(self::BACKSTAGE_PASSES, 10, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(3, $items[0]->quality);
        $this->assertEquals(9, $items[0]->sell_in);
    }

    public function testBackstageIfAdds3TimesMoreWhen5DaysLeft()
    {
        $items      = [new Item(self::BACKSTAGE_PASSES, 5, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(4, $items[0]->quality);
        $this->assertEquals(4, $items[0]->sell_in);
    }

    public function testBackstageIfQualityDroppedToZeroOnSellDate()
    {
        $items      = [new Item(self::BACKSTAGE_PASSES, 0, 45)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->quality);
        $this->assertEquals(-1, $items[0]->sell_in);
    }

    public function testBackstageQualityDroppedToZeroAfterSellDate()
    {
        $items      = [new Item(self::BACKSTAGE_PASSES, -2, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->quality);
        $this->assertEquals(-3, $items[0]->sell_in);
    }

    public function testBackstageIfDoesntAddQualityAbove50()
    {
        $items      = [new Item(self::BACKSTAGE_PASSES, 1, 50)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(50, $items[0]->quality);
        $this->assertEquals(0, $items[0]->sell_in);
    }

    public function testSulfurasIfAddsNormally()
    {
        $items      = [new Item(self::SULFURAS, 10, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(80, $items[0]->quality);
        $this->assertEquals(10, $items[0]->sell_in);
    }

    public function testSulfurasIfKeepsQualityNormallyOnSellDate()
    {
        $items      = [new Item(self::SULFURAS, 0, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(80, $items[0]->quality);
        $this->assertEquals(0, $items[0]->sell_in);
    }

    public function testSulfurasIfKeepsQualityNormallyAfterSellDate()
    {
        $items      = [new Item(self::SULFURAS, -2, 80)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(80, $items[0]->quality);
        $this->assertEquals(-2, $items[0]->sell_in);
    }

    public function testSulfurasIfAdjustsQualityTo80()
    {
        $items      = [new Item(self::SULFURAS, -2, 70)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(80, $items[0]->quality);
        $this->assertEquals(-2, $items[0]->sell_in);
    }

    public function testRandomItemIfAddsTwiceOnSellDate()
    {
        $items      = [new Item(self::RANDOM, 0, 3)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(1, $items[0]->quality);
        $this->assertEquals(-1, $items[0]->sell_in);
    }
    public function testRandomItemIfAddsNormally()
    {
        $items      = [new Item(self::RANDOM, 1, 3)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(2, $items[0]->quality);
        $this->assertEquals(0, $items[0]->sell_in);
    }
    public function testRandomItemIfAddsTwiceAfterSellDate()
    {
        $items      = [new Item(self::RANDOM, -2, 4)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(2, $items[0]->quality);
        $this->assertEquals(-3, $items[0]->sell_in);
    }
    public function testRandomItemIfQualityIsNeverBelow0()
    {
        $items      = [new Item(self::RANDOM, -2, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->quality);
        $this->assertEquals(-3, $items[0]->sell_in);
    }
    public function testConjuredIfAddsTwiceOnSellDate()
    {
        $items      = [new Item(self::CONJURED, 0, 6)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(2, $items[0]->quality);
        $this->assertEquals(-1, $items[0]->sell_in);
    }
    public function testConjuredIfAddsNormally()
    {
        $items      = [new Item(self::CONJURED, 1, 5)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(3, $items[0]->quality);
        $this->assertEquals(0, $items[0]->sell_in);
    }
    public function testConjuredIfQualityIsntBelow0AfterAdd()
    {
        $items      = [new Item(self::CONJURED, 1, 1)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->quality);
        $this->assertEquals(0, $items[0]->sell_in);
    }
    public function testConjuredIfAddsTwiceQualityAfterSellDate()
    {
        $items      = [new Item(self::CONJURED, -1, 3)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(0, $items[0]->quality);
        $this->assertEquals(-2, $items[0]->sell_in);
    }
}
