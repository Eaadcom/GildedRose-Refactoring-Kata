<?php
declare(strict_types=1);

namespace GildedRose\items;
use GildedRose\items\UpdateableInterface;
use GildedRose\Item;

class RegularItem extends Item implements UpdateableInterface
{
    public function __construct(
        public string $name,
        public int $sellIn,
        public int $quality
    ) {
        parent::__construct($name, $sellIn, $quality);
    }

    public function update() : void{
        $this->sellIn--;

        $degradationAmount = 1;

        if ($this->sellIn < 0){
            $degradationAmount = 2;
        }

        $this->quality = max(0, $this->quality - $degradationAmount);
    }
}
