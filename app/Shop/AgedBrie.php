<?php

namespace App\Shop;

use App\Item;
use App\UpdateQualityInterface;

class AgedBrie extends ItemMethods implements UpdateQualityInterface
{
    private $item;

    /**
     * AgedBrie constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        parent::__construct($item);
        $this->item = $item;
    }

    /**
     * Update quality of Aged Brie
     */
    public function updateQuality(): void
    {
        $this->addQuality(1);
        if ($this->hasReachedSellDate()) {
            $this->addQuality(1);
        }
        $this->addSellIn(-1);
        $this->syncWithBoundaries();
    }
}
