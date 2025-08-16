<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Path;

use Skeleton\Exception;

final readonly class ValidDirectoryPath implements Path
{
    public function __construct(private string $path)
    {
        if (!is_dir($path)) {
            throw new Exception("Not a directory: $path");
        }
    }

    #[\Override]
    public function value(): string
    {
        return $this->path;
    }
}
