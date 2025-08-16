<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Path;

/**
 * Removes the trailing slash from a path,
 * except when the path is the root ('/').
 */
final readonly class TrimmedSlashPath implements Path
{
    public function __construct(private Path $origin)
    {
    }

    #[\Override]
    public function value(): string
    {
        $value = $this->origin->value();
        return ($value !== '/' && str_ends_with($value, '/'))
            ? rtrim($value, '/')
            : $value;
    }
}
