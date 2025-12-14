<?php
declare(strict_types=1);

namespace GildedRose\items;
use GildedRose\items\UpdateableInterface;
use GildedRose\Item;

class SulfurasItem extends Item implements UpdateableInterface
{
    public function __construct(
        public string $name,
    ) {
        parent::__construct($name, 0, 80);
    }

    public function update() : void{
        // The quality of Sulfuras never changes, and it never has to be sold.
    }
}
