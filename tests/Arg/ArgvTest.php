<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Arg;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Arg\ArgMissing;
use Skeleton\Arg\ArgProvided;
use Skeleton\Arg\Argv;

final class ArgvTest extends TestCase
{
    #[Test]
    public function returnsProvidedArgWhenPresent(): void
    {
        $this->assertInstanceOf(
            ArgProvided::class,
            new Argv(['--vendor=haspadar'])->named('vendor'),
            'Should return ArgProvided when argument is present'
        );
    }

    #[Test]
    public function returnsMissingArgWhenNotPresent(): void
    {
        $this->assertInstanceOf(
            ArgMissing::class,
            new Argv(['--vendor=haspadar'])->named('repo'),
            'Should return ArgMissing when argument is not present'
        );
    }

    #[Test]
    public function returnsCorrectValueWhenProvided(): void
    {
        $this->assertSame(
            'haspadar',
            new Argv(['--vendor=haspadar'])->named('vendor')->value(),
            'Should return correct argument value'
        );
    }
}
