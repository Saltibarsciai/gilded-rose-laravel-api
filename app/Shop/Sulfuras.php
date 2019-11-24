<?php

namespace App\Shop;

use App\Item;
use App\UpdateQualityInterface;

class Sulfuras extends ItemMethods implements UpdateQualityInterface
{
    private $item;

    /**
     * Sulfuras constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        parent::__construct($item);
        $this->item = $item;
    }

    /**
     * Update quality of Sulfuras
     */
    public function updateQuality(): void
    {
        $this->setQuality(80);
    }
}
