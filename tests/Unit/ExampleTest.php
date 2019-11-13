<?php

namespace Tests\Unit;

use App\GildedRose;
use App\Item;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testFoo() {
        $items      = [new Item("foo", 0, 0)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals("foo", $items[0]->name);
    }
}
