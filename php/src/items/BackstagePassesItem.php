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
            return;
        }

        if ($this->sellIn > 10) {
            $this->quality++;
        } else if (10 >= $this->sellIn && $this->sellIn > 5) {
            $this->quality += 2;
        } else if (5 >= $this->sellIn && $this->sellIn >= 0) {
            $this->quality += 3;
        }
    }
}
