<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Composer;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Composer\JsonFirstMapKey;
use Skeleton\Exception;
use Skeleton\Text\TextOf;

final class JsonFirstMapKeyTest extends TestCase
{
    #[Test]
    public function returnsKeyWhenValidMap(): void
    {
        $this->assertSame(
            'App',
            new JsonFirstMapKey(
                new TextOf('{"autoload": {"psr-4": {"App\\\": "src/"}}}'),
                'autoload',
                'psr-4'
            )->value(),
            'must return first key from nested JSON map'
        );
    }

    #[Test]
    public function throwsWhenMapIsEmpty(): void
    {
        $this->expectException(Exception::class);

        new JsonFirstMapKey(
            new TextOf('{"autoload": {"psr-4": {}}}'),
            'autoload',
            'psr-4'
        )->value();
    }
}
