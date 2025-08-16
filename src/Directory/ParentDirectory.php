<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Directory;

use Skeleton\Exception;
use Skeleton\Path\Path;

final readonly class ParentDirectory
{
    public function __construct(private Path $path)
    {
    }
    public function ensure(): void
    {
        $dir = dirname($this->path->value());
        if (!is_dir($dir) && !mkdir($dir, recursive: true) && !is_dir($dir)) {
            throw new Exception("Failed to create dir: $dir");
        }
    }
}
