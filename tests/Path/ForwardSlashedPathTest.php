<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Path;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Path\ForwardSlashedPath;
use Skeleton\Path\PathFrom;

final class ForwardSlashedPathTest extends TestCase
{
    #[Test]
    public function returnsWithForwardSlashesWhenPathHasBackslashes(): void
    {
        $this->assertSame(
            'C:/proj/src',
            new ForwardSlashedPath(new PathFrom('C:\\proj\\src'))->value(),
            'replaces backslashes with forward slashes'
        );
    }

    #[Test]
    public function returnsSameWhenPathAlreadyHasForwardSlashes(): void
    {
        $this->assertSame(
            '/var/www/html',
            new ForwardSlashedPath(new PathFrom('/var/www/html'))->value(),
            'keeps forward slashes as-is'
        );
    }

    #[Test]
    public function returnsNormalizedWhenPathHasMixedSlashes(): void
    {
        $this->assertSame(
            'D:/work/bin',
            new ForwardSlashedPath(new PathFrom('D:/work\\bin'))->value(),
            'normalizes mixed slashes'
        );
    }
}
