<?php
declare(strict_types=1);

namespace GildedRose\items;
use GildedRose\items\UpdateableInterface;
use GildedRose\Item;

class BackstagePassesItem extends Item implements UpdateableInterface
{
    public function __construct(
        public string $name,
        public int $sellIn,
        public int $quality
    ) {
        parent::__construct($name, $sellIn, $quality);
    }

    public function update(): void
    {
        $this->sellIn--;

        if ($this->sellIn < 0) {
            $this->quality = 0;
        } else {
            $increase = match (true) {
                $this->sellIn < 5 => 3,
                $this->sellIn < 10 => 2,
                default => 1
            };
            $this->quality = min(50, $this->quality + $increase);
        }
    }
}
