<?php

namespace App\Shop;

use App\Item;
use App\UpdateQualityInterface;

class BackstagePasses extends ItemMethods implements UpdateQualityInterface
{
    private $item;

    /**
     * BackstagePasses constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        parent::__construct($item);
        $this->item = $item;
    }

    /**
     * Update quality of Backstage pass
     */
    public function updateQuality(): void
    {
        $this->addQuality(1);
        if ($this->daysLeft(10)) {
            $this->addQuality(1);
        }
        if ($this->daysLeft(5)) {
            $this->addQuality(1);
        }
        if ($this->hasReachedSellDate()) {
            $this->setQualityToZero();
        }
        $this->addSellIn(-1);
        $this->syncWithBoundaries();
    }
}
