<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Path;

/**
 * Prepend the current working directory to the path
 * if it is not already absolute.
 */
final readonly class PrependedCwdPath implements Path
{
    public function __construct(private Path $origin)
    {
    }

    #[\Override]
    public function value(): string
    {
        $raw = $this->origin->value();

        return str_starts_with($raw, DIRECTORY_SEPARATOR)
            ? $raw
            : getcwd() . DIRECTORY_SEPARATOR . $raw;
    }
}
