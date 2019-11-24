<?php

namespace App\Shop;

use App\Item;
use App\UpdateQualityInterface;

class Conjured extends ItemMethods implements UpdateQualityInterface
{
    private $item;

    /**
     * Conjured constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        parent::__construct($item);
        $this->item = $item;
    }

    /**
     * Update quality of Conjured
     */
    public function updateQuality(): void
    {
        $this->addQuality(-2);
        if ($this->hasReachedSellDate()) {
            $this->addQuality(-2);
        }
        $this->addSellIn(-1);
        $this->syncWithBoundaries();
    }
}
