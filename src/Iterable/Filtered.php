<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Iterable;

use Skeleton\Func\Pred;

/**
 * @template T
 * @implements \IteratorAggregate<int, T>
 */
final readonly class Filtered implements \IteratorAggregate
{
    /**
     * @param iterable<T> $origin
     * @param Pred<T> $predicate
     */
    public function __construct(
        public iterable $origin,
        public Pred $predicate
    ) {
    }

    #[\Override]
    public function getIterator(): \Traversable
    {
        foreach ($this->origin as $item) {
            if ($this->predicate->test($item)) {
                yield $item;
            }
        }
    }
}
