<?php

namespace App\shop;

use App\UpdateQualityInterface;

class Conjured extends ItemMethods implements UpdateQualityInterface
{
    private $item;

    public function __construct($item)
    {
        parent::__construct($item);
        $this->item = $item;
    }

    public function updateQuality()
    {
        $this->addQuality(-2);
        if ($this->hasReachedSellDate()) {
            $this->addQuality(-2);
        }
        $this->addSellIn(-1);
        $this->syncWithBoundaries();
    }
}
