<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Iterable;

use Skeleton\Text\Text;
use Skeleton\Text\TextOf;

/**
 * @implements \IteratorAggregate<int, Text>
 */
final readonly class SplitByPattern implements \IteratorAggregate
{
    public function __construct(
        private string $pattern,
        private Text $origin
    ) {
    }

    #[\Override]
    public function getIterator(): \Traversable
    {
        foreach (preg_split($this->pattern, $this->origin->value()) ?: [] as $part) {
            yield new TextOf($part);
        }
    }
}
