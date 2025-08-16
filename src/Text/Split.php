<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Text;

use IteratorAggregate;
use Traversable;

/**
 * @implements IteratorAggregate<int, Text>
 */
final readonly class Split implements IteratorAggregate
{
    public function __construct(
        private Text $origin,
        private string $delimiter
    ) {
    }

    /** @return Traversable<Text> */
    #[\Override]
    public function getIterator(): Traversable
    {
        foreach (explode($this->delimiter, $this->origin->value()) as $part) {
            yield new TextOf($part);
        }
    }
}
