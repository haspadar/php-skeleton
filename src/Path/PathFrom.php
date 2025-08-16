<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Path;

final readonly class PathFrom implements Path
{
    public function __construct(private string $path)
    {
    }

    #[\Override]
    public function value(): string
    {
        return $this->path;
    }
}
