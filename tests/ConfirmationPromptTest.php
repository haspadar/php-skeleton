<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\TestWith;
use PHPUnit\Framework\TestCase;
use Skeleton\ConfirmationPrompt;
use Skeleton\Task\AbortedTask;
use Skeleton\Tests\Console\FakeConsole;
use Skeleton\Tests\Task\DummyTask;
use Skeleton\Text\TextOf;

final class ConfirmationPromptTest extends TestCase
{
    use ThrowAsserts;

    #[Test]
    #[TestWith([''])]
    #[TestWith(['y'])]
    #[TestWith(['Y'])]
    #[TestWith(['yes'])]
    #[TestWith(['YES'])]
    public function returnsOriginalTaskOnYes(string $input): void
    {
        $console = new FakeConsole("y\n");
        $task = new DummyTask();

        $result = new ConfirmationPrompt(
            ['Key' => new TextOf('Value')],
            $console
        )->task($task);

        $this->assertSame($task, $result, 'Should proceed for: "' . $input . '"');
    }

    #[Test]
    public function returnsAbortedTaskOnNo(): void
    {
        $console = new FakeConsole("n\n");
        $task = new DummyTask();
        $result = new ConfirmationPrompt(
            ['Key' => new TextOf('Value')],
            $console
        )->task($task);

        $this->assertInstanceOf(
            AbortedTask::class,
            $result,
            'Should return AbortedTask if user declines'
        );
    }
}
