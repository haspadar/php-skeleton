<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Path;

use Skeleton\Path\Path;

final readonly class InvalidPath implements Path
{
    public function value(): string
    {
        return '/invalid/:::path###';
    }
}
