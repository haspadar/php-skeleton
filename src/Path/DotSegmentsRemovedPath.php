<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Path;

/**
 * Normalizes a path by removing "." and ".." segments.
 */
final readonly class DotSegmentsRemovedPath implements Path
{
    public function __construct(private Path $origin)
    {
    }

    /**
     * Removes dot segments from the path:
     * - '/./' → '/'
     * - '/.' at the end → '/'
     * - '/../' removes the previous segment
     */
    #[\Override]
    public function value(): string
    {
        $result = [];

        foreach (explode('/', $this->origin->value()) as $segment) {
            match (true) {
                $segment === '' => null,
                $segment === '.' => null,
                $segment === '..' => array_pop($result),
                default => $result[] = $segment,
            };
        }

        return '/' . implode('/', $result);
    }
}
