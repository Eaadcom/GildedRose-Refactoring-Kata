<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\items\AgedBrieItem;
use GildedRose\items\UpdateableInterface;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(
        private array $items
    ) {
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if (!$item instanceof UpdateableInterface) {
                throw new \RuntimeException(
                    "Item \"{$item->name}\" is not an instance of UpdateableInterface, which all items should implement"
                );
            }

            $item->update();
        }
    }
}
