<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Composer;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Composer\JsonKeyText;
use Skeleton\Exception;
use Skeleton\Text\TextOf;

final class JsonKeyTextTest extends TestCase
{
    #[Test]
    public function returnsScalarValue(): void
    {
        $this->assertSame(
            'Lib',
            new JsonKeyText(
                new TextOf('{"name":"Haspadar/mono","description":"Lib"}'),
                'description'
            )->value(),
            'reads top-level key'
        );
    }

    #[Test]
    public function returnsNestedScalarValue(): void
    {
        $this->assertSame(
            'v',
            new JsonKeyText(
                new TextOf('{"a":{"b":{"c":"v"}}}'),
                'a.b.c'
            )->value(),
            'reads nested key'
        );
    }

    #[Test]
    public function throwsOnMissingKey(): void
    {
        $this->expectException(Exception::class);

        new JsonKeyText(
            new TextOf('{"a":{"b":1}}'),
            'a.c'
        )->value();
    }
}
