<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Iterable;

/**
 * @template T
 */
final readonly class ListOf
{
    /** @param iterable<T> $origin */
    public function __construct(private iterable $origin)
    {
    }

    /** @return array<int,T> */
    public function array(): array
    {
        return array_values(
            is_array($this->origin)
                ? $this->origin
                : iterator_to_array($this->origin, false)
        );
    }
}
