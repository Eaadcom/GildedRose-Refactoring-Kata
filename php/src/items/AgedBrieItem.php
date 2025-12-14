<?php
declare(strict_types=1);

namespace GildedRose\items;
use GildedRose\items\UpdateableInterface;
use GildedRose\Item;

class AgedBrieItem extends Item implements UpdateableInterface
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

        $increase = $this->sellIn < 0 ? 2 : 1;

        $this->quality = min(50, $this->quality + $increase);
    }
}
