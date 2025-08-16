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
use Skeleton\Path\TrimmedSlashPath;

final class TrimmedSlashPathTest extends TestCase
{
    #[Test]
    public function returnsPathWithoutTrailingSlashWhenPathHasTrailingSlash(): void
    {
        $this->assertSame(
            '/var/www',
            new TrimmedSlashPath(new PathFrom('/var/www/'))->value(),
            'removes single trailing slash'
        );
    }

    #[Test]
    public function returnsRootUnchangedWhenPathIsRoot(): void
    {
        $this->assertSame(
            '/',
            new TrimmedSlashPath(new PathFrom('/'))->value(),
            'keeps root slash'
        );
    }

    #[Test]
    public function returnsSameWhenNoTrailingSlash(): void
    {
        $this->assertSame(
            '/var/www',
            new TrimmedSlashPath(new PathFrom('/var/www'))->value(),
            'keeps path as-is if no trailing slash'
        );
    }
}
