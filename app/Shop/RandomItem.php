<?php

namespace App\Shop;

use App\Item;
use App\UpdateQualityInterface;

class RandomItem extends ItemMethods implements UpdateQualityInterface
{
    private $item;

    /**
     * RandomItem constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        parent::__construct($item);
        $this->item = $item;
    }

    /**
     * Update quality of Random item
     */
    public function updateQuality(): void
    {
        $this->addQuality(-1);
        if ($this->hasReachedSellDate()) {
            $this->addQuality(-1);
        }
        $this->addSellIn(-1);
        $this->syncWithBoundaries();
    }
}
