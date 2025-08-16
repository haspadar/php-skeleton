<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Event;

use Skeleton\Path\Path;

final readonly class FilePatched implements Event
{
    public function __construct(private Path $path)
    {
    }

    public function path(): Path
    {
        return $this->path;
    }
}
