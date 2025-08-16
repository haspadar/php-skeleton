<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Composer;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Composer\FirstAvailableText;
use Skeleton\Exception;
use Skeleton\Text\TextOf;

final class FirstAvailableTextTest extends TestCase
{
    #[Test]
    public function returnsFirstNonEmptyWhenCandidatesHaveValues(): void
    {
        $this->assertSame(
            'foo',
            new FirstAvailableText(
                new TextOf(''),
                new TextOf('foo'),
                new TextOf('bar')
            )->value(),
            'returns first non-empty candidate'
        );
    }

    #[Test]
    public function throwsWhenAllCandidatesAreEmpty(): void
    {
        $this->expectException(Exception::class);
        new FirstAvailableText(
            new TextOf(''),
            new TextOf('')
        )->value();
    }
}
