<?php

namespace App\shop;

use App\UpdateQualityInterface;

class Sulfuras extends ItemMethods implements UpdateQualityInterface
{
    private $item;

    public function __construct($item)
    {
        parent::__construct($item);
        $this->item = $item;
    }

    public function updateQuality()
    {
        $this->setQuality(80);
    }
}
