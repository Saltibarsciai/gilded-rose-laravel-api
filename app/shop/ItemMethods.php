<?php


namespace App\shop;

class ItemMethods
{
    private $item;

    public function __construct($item)
    {
        $this->item = $item;
    }
    public function addSellIn($addDays){
        $this->item->sell_in += $addDays;
    }
    public function addQuality($qualityPoints)
    {
        $this->item->quality += $qualityPoints;
    }
    public function setQuality($qualityPoints)
    {
        $this->item->quality = $qualityPoints;
    }
    public function setQualityToZero()
    {
        $this->item->quality = 0;
    }
    public function daysLeft($days) :bool
    {
        return $this->item->sell_in <= $days;
    }
    public function hasReachedSellDate() :bool
    {
        return $this->item->sell_in <= 0;
    }
    public function syncWithBoundaries()
    {
        if($this->item->quality > 50){
            $this->item->quality = 50;
        }
        elseif($this->item->quality < 0){
            $this->item->quality = 0;
        }
    }
}
