<?php
declare(strict_types=1);

namespace GildedRose\items;
use GildedRose\items\UpdateableInterface;
use GildedRose\Item;

class ConjuredItem extends Item implements UpdateableInterface
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

        if ($this->quality == 0){
            return;
        }

        if ($this->sellIn < 0 && $this->quality < 5){
            $this->quality = 0;
            return;
        }
        if ($this->sellIn >= 0 && $this->quality < 3){
            $this->quality = 0;
            return;
        }

        if ($this->sellIn < 0){
            $this->quality -= 4;
        } else {
            $this->quality -= 2;
        }
    }
}
