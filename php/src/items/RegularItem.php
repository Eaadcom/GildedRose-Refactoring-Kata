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

        if ($this->quality == 0){
            return;
        }

        if ($this->sellIn < 0){
            if ($this->quality <= 2){
                $this->quality = 0;
                return;
            }

            $this->quality -= 2;
        } else {
            $this->quality--;
        }
    }
}
