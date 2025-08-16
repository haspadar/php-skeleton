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
use Skeleton\Path\PrependedCwdPath;

final class PrependedCwdPathTest extends TestCase
{
    #[Test]
    public function returnsSameWhenPathIsAbsolute(): void
    {
        $absolute = DIRECTORY_SEPARATOR . 'etc' . DIRECTORY_SEPARATOR . 'config';
        $this->assertSame(
            $absolute,
            new PrependedCwdPath(new PathFrom($absolute))->value(),
            'keeps absolute paths as-is'
        );
    }

    #[Test]
    public function prependsCwdWhenPathIsRelative(): void
    {
        $relative = 'src/file.txt';
        $this->assertSame(
            getcwd() . DIRECTORY_SEPARATOR . $relative,
            new PrependedCwdPath(new PathFrom($relative))->value(),
            'prepends CWD to relative paths'
        );
    }
}
