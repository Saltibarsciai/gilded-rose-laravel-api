<?php

namespace App\Shop;

use App\Item;

class ItemMethods
{
    private $item;

    /**
     * ItemMethods constructor.
     * @param Item $item
     */
    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    /**
     * @param int $addDays
     */
    public function addSellIn(int $addDays): void
    {
        $this->item->sell_in += $addDays;
    }

    /**
     * @param int $qualityPoints
     */
    public function addQuality(int $qualityPoints): void
    {
        $this->item->quality += $qualityPoints;
    }

    /**
     * @param int $qualityPoints
     */
    public function setQuality(int $qualityPoints): void
    {
        $this->item->quality = $qualityPoints;
    }

    public function setQualityToZero(): void
    {
        $this->item->quality = 0;
    }

    /**
     * @param int $days
     * @return bool
     */
    public function daysLeft(int $days): bool
    {
        return $this->item->sell_in <= $days;
    }

    /**
     * @return bool
     */
    public function hasReachedSellDate(): bool
    {
        return $this->item->sell_in <= 0;
    }

    public function syncWithBoundaries(): void
    {
        if ($this->item->quality > 50) {
            $this->item->quality = 50;
        } elseif ($this->item->quality < 0) {
            $this->item->quality = 0;
        }
    }
}
