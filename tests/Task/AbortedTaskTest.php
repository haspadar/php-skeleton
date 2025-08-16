<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Task;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Task\AbortedTask;
use Skeleton\Tests\Console\FakeConsole;

final class AbortedTaskTest extends TestCase
{
    #[Test]
    public function writesAbortedMessageToError(): void
    {
        $console = new FakeConsole();

        new AbortedTask($console)->perform();

        $this->assertStringContainsString(
            'Aborted.',
            $console->lastError(),
            'error output contains aborted message'
        );
    }
}
