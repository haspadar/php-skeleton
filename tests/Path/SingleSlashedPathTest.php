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
use Skeleton\Path\SingleSlashedPath;

final class SingleSlashedPathTest extends TestCase
{
    #[Test]
    public function collapsesConsecutiveSlashes(): void
    {
        $this->assertSame(
            '/a/b',
            new SingleSlashedPath(new PathFrom('///a//b'))->value(),
            'collapses multiple slashes into one'
        );
    }
}
