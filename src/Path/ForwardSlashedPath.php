<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Path;

/**
 * Replace all backslashes with forward slashes.
 * Useful for normalizing Windows paths to a consistent format.
 */
final readonly class ForwardSlashedPath implements Path
{
    public function __construct(private Path $origin)
    {
    }

    #[\Override]
    public function value(): string
    {
        return str_replace('\\', '/', $this->origin->value());
    }
}
