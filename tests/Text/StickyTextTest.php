<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Text;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Text\StickyText;
use Skeleton\Text\TextOf;

final class StickyTextTest extends TestCase
{
    #[Test]
    public function returnsValueWhenCalled(): void
    {
        $this->assertSame(
            'abc',
            new StickyText(new TextOf('abc'))->value(),
            'Returns correct value on first call'
        );
    }

    #[Test]
    public function returnsSameValueWhenCalledAgain(): void
    {
        $text = new StickyText(new CountingText());

        $text->value();

        $this->assertSame(
            'call-1',
            $text->value(),
            'Returns same cached value on second call'
        );
    }

    #[Test]
    public function callsOriginOnlyOnceWhenAccessedTwice(): void
    {
        $counting = new CountingText();

        $sticky = new StickyText($counting);
        $sticky->value();
        $sticky->value();

        $this->assertSame(
            1,
            $counting->calls(),
            'Origin value() called only once'
        );
    }
}
