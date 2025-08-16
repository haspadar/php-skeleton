<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Path;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Path\AbsolutePath;
use Skeleton\Path\PathFrom;

final class AbsolutePathTest extends TestCase
{
    #[Test]
    public function returns_same_if_absolute(): void
    {
        $this->assertSame(
            '/usr/local/bin',
            new AbsolutePath(new PathFrom('/usr/local/bin'))->value(),
            'Returns same absolute path'
        );
    }

    #[Test]
    public function resolves_relative_path(): void
    {
        $this->assertSame(
            getcwd() . '/src/tests',
            new AbsolutePath(new PathFrom('src/tests'))->value(),
            'Resolves relative to absolute'
        );
    }

    #[Test]
    public function resolves_current_directory(): void
    {
        $this->assertSame(
            getcwd(),
            new AbsolutePath(new PathFrom('.'))->value(),
            'Resolves "." to current directory'
        );
    }

    #[Test]
    public function resolves_parent_directory(): void
    {
        $this->assertSame(
            dirname(getcwd()),
            new AbsolutePath(new PathFrom('..'))->value(),
            'Resolves ".." to parent directory'
        );
    }
}
