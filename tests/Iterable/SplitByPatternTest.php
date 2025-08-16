<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Iterable;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Iterable\SplitByPattern;
use Skeleton\Text\Text;
use Skeleton\Text\TextOf;

final class SplitByPatternTest extends TestCase
{
    /** @return list<string> */
    private function values(iterable $iter): array
    {
        $out = [];
        foreach ($iter as $item) {
            $this->assertInstanceOf(Text::class, $item);
            $out[] = $item->value();
        }
        return $out;
    }

    #[Test]
    public function splitsByWhitespaceAndKeepsEmptyEdges(): void
    {
        $parts = new SplitByPattern('/\s+/', new TextOf('  a  b   '));

        $this->assertSame(
            ['', 'a', 'b', ''],
            $this->values($parts),
            'splits on whitespace and preserves empty tokens at edges'
        );
    }

    #[Test]
    public function splitsOnCommaWithOptionalSpacesAndKeepsEmptyMiddle(): void
    {
        $parts = new SplitByPattern('/\s*,\s*/', new TextOf('a,b, c,,d'));

        $this->assertSame(
            ['a', 'b', 'c', '', 'd'],
            $this->values($parts),
            'keeps empty token when there are consecutive separators'
        );
    }

    #[Test]
    public function returnsWholeStringWhenNoMatch(): void
    {
        $parts = new SplitByPattern('/,/', new TextOf('abc'));

        $this->assertSame(
            ['abc'],
            $this->values($parts),
            'no matches -> single original token'
        );
    }
}
