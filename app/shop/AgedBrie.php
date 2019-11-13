<?php

namespace App\shop;

use App\UpdateQualityInterface;

class AgedBrie extends ItemMethods implements UpdateQualityInterface
{
    private $item;

    public function __construct($item)
    {
        parent::__construct($item);
        $this->item = $item;
    }

    public function updateQuality()
    {
        if($this->hasReachedSellDate()) {
            $this->addQuality(1);
        }
        $this->addSellIn(-1);
        $this->addQuality(1);
        $this->syncWithBoundaries();
    }
}