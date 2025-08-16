<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Task;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Event\Events;
use Skeleton\Task\CopyDirectoryTask;
use Skeleton\Tests\Directory\FakeDirectory;

final class CopyDirectoryTaskTest extends TestCase
{
    #[Test]
    public function writesNothingWhenSourceIsEmpty(): void
    {
        $target = new FakeDirectory();
        new CopyDirectoryTask(
            new FakeDirectory([]),
            $target,
            new Events()
        )->perform();

        $this->assertSame(
            [],
            $target->written(),
            'does nothing when source is empty'
        );
    }
}
