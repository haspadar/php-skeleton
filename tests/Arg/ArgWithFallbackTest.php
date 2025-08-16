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
use Skeleton\Arg\ArgWithFallback;
use Skeleton\Text\TextOf;

final class ArgWithFallbackTest extends TestCase
{
    #[Test]
    public function usesOriginValueWhenProvided(): void
    {
        $this->assertSame(
            'provided',
            new ArgWithFallback(
                new ArgProvided('name', 'provided'),
                new TextOf('fallback')
            )->value(),
            'Expected value from ArgProvided'
        );
    }

    #[Test]
    public function usesFallbackValueWhenMissing(): void
    {
        $this->assertSame(
            'fallback',
            new ArgWithFallback(
                new ArgMissing('name'),
                new TextOf('fallback')
            )->value(),
            'Expected value from fallback'
        );
    }

    #[Test]
    public function hasValueTrueWhenProvided(): void
    {
        $this->assertTrue(
            new ArgWithFallback(
                new ArgProvided('name', 'val'),
                new TextOf('fallback')
            )->hasValue(),
            'Expected hasValue to be true from ArgProvided'
        );
    }

    #[Test]
    public function hasValueTrueWhenFallbackExists(): void
    {
        $this->assertFalse(
            new ArgWithFallback(
                new ArgMissing('name'),
                new TextOf('fallback')
            )->hasValue(),
            'Expected hasValue to be false if only fallback provided'
        );
    }

    #[Test]
    public function delegatesName(): void
    {
        $this->assertSame(
            'repo',
            new ArgWithFallback(
                new ArgProvided('repo', 'val', 'desc'),
                new TextOf('fallback')
            )->name(),
            'Expected name from origin'
        );
    }

    #[Test]
    public function delegatesDescription(): void
    {
        $this->assertSame(
            'desc',
            new ArgWithFallback(
                new ArgProvided('repo', 'val', 'desc'),
                new TextOf('fallback')
            )->description(),
            'Expected description from origin'
        );
    }
}
