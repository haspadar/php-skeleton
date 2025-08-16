<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton;

/**
 * Example:
 * (new Each($source, fn($file) => ...))->perform();
 *
 * @template T
 */
final readonly class Each
{
    /**
     * @param iterable<T> $items
     * @param \Closure(T): void $effect
     */
    public function __construct(
        private iterable $items,
        private \Closure $effect
    ) {
    }

    public function perform(): void
    {
        foreach ($this->items as $item) {
            ($this->effect)($item);
        }
    }
}
