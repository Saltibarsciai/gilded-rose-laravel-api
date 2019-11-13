<?php

namespace App\shop;

use App\UpdateQualityInterface;

class BackstagePasses extends ItemMethods implements UpdateQualityInterface
{
    private $item;

    public function __construct($item)
    {
        parent::__construct($item);
        $this->item = $item;
    }

    public function updateQuality()
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
