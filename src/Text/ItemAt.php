<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Text;

use Skeleton\Exception;

/**
 * Text at a given index from an iterable<Text>.
 */
final readonly class ItemAt implements Text
{
    /** @param iterable<Text> $items */
    public function __construct(
        private iterable $items,
        private int $index
    ) {
    }

    #[\Override]
    public function value(): string
    {
        $i = 0;
        foreach ($this->items as $item) {
            if ($i === $this->index) {
                return $item->value();
            }

            $i++;
        }
        throw new Exception("No item at index $this->index");
    }
}
