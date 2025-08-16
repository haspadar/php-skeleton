<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: Copyright (c) 2025 Kanstantsin Mesnik
 */
declare(strict_types=1);

namespace Skeleton\Tests\Path;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Path\PathFrom;
use Skeleton\Path\RelativePath;

final class RelativePathTest extends TestCase
{
    #[Test]
    public function fullReturnsPathRelativeToBase(): void
    {
        $this->assertSame(
            'subdir/file.txt',
            new RelativePath(
                new PathFrom('/var/www/project'),
                new PathFrom('/var/www/project/subdir/file.txt')
            )->value(),
            'Expected relative path to remove base from full path'
        );
    }
}
