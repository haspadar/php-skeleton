<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Text;

/**
 * Joins an iterable of Text into a single string.
 */
final readonly class Joined implements Text
{
    /**
     * @param iterable<Text> $origin
     */
    public function __construct(
        private string $separator,
        private iterable $origin,
    ) {
    }

    #[\Override]
    public function value(): string
    {
        $parts = [];
        foreach ($this->origin as $item) {
            $parts[] = $item->value();
        }

        return implode($this->separator, $parts);
    }
}
