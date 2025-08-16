<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Path;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Exception;
use Skeleton\Path\ValidDirectoryPath;
use Skeleton\Tests\ThrowAsserts;

final class ValidDirectoryPathTest extends TestCase
{
    use ThrowAsserts;
    #[Test]
    public function returnsPathWhenValid(): void
    {
        $this->assertSame(
            __DIR__,
            new ValidDirectoryPath(__DIR__)->value(),
            'Expected path to return as-is for a valid directory'
        );
    }

    #[Test]
    public function throwsWhenNotDirectory(): void
    {
        $this->assertThrows(
            fn () => new ValidDirectoryPath(__FILE__)->value(),
            Exception::class,
            'Expected exception when path is not a directory'
        );
    }
}
