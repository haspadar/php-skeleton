<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Iterable;

use Skeleton\Func\Func;

/**
 * @template TIn
 * @template TOut
 * @implements \IteratorAggregate<int, TOut>
 */
final readonly class Mapped implements \IteratorAggregate
{
    /**
     * @param iterable<TIn> $origin
     * @param Func<TIn, TOut> $map
     */
    public function __construct(
        private iterable $origin,
        private Func $map
    ) {
    }

    #[\Override]
    public function getIterator(): \Traversable
    {
        foreach ($this->origin as $item) {
            yield $this->map->apply($item);
        }
    }
}
