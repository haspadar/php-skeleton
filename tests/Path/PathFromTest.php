<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Path;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Path\PathFrom;

final class PathFromTest extends TestCase
{
    #[Test]
    public function returnsOriginalPath(): void
    {
        $this->assertSame(
            '/tmp/project',
            new PathFrom('/tmp/project')->value(),
            'Expected full path to match input'
        );
    }
}
