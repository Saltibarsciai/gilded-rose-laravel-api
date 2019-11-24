<?php

namespace App;

final class Item
{
    public $name;
    public $sell_in;
    public $quality;

    /**
     * Item constructor.
     * @param string $name
     * @param int $sell_in
     * @param int $quality
     */
    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name    = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }
}

