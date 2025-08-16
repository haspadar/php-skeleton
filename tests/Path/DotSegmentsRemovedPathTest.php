<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Path;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Path\DotSegmentsRemovedPath;
use Skeleton\Path\PathFrom;

final class DotSegmentsRemovedPathTest extends TestCase
{
    #[Test]
    public function returnsNormalizedWhenHasSingleDotSegment(): void
    {
        $this->assertSame(
            '/a/b',
            new DotSegmentsRemovedPath(new PathFrom('/a/./b'))->value(),
            'removes single-dot segment'
        );
    }

    #[Test]
    public function returnsNormalizedWhenEndsWithDot(): void
    {
        $this->assertSame(
            '/a',
            new DotSegmentsRemovedPath(new PathFrom('/a/.'))->value(),
            'removes trailing dot segment'
        );
    }

    #[Test]
    public function returnsNormalizedWhenHasParentSegments(): void
    {
        $this->assertSame(
            '/a/c',
            new DotSegmentsRemovedPath(new PathFrom('/a/b/../c'))->value(),
            'resolves parent segment'
        );
    }

    #[Test]
    public function returnsRootWhenPathGoesAboveRoot(): void
    {
        $this->assertSame(
            '/',
            new DotSegmentsRemovedPath(new PathFrom('/../'))->value(),
            'does not go above root'
        );
    }
}
