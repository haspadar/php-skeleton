<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Text;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Exception;
use Skeleton\Tests\ThrowAsserts;
use Skeleton\Text\PascalCase;
use Skeleton\Text\TextOf;

final class PascalCaseTest extends TestCase
{
    use ThrowAsserts;

    #[Test]
    public function convertsSnakeCase(): void
    {
        $this->assertSame(
            'HelloWorld',
            new PascalCase(new TextOf('hello_world'))->value(),
            'Should convert snake_case to PascalCase'
        );
    }

    #[Test]
    public function convertsKebabCase(): void
    {
        $this->assertSame(
            'HelloWorld',
            new PascalCase(new TextOf('hello-world'))->value(),
            'Should convert kebab-case to PascalCase'
        );
    }

    #[Test]
    public function convertsMixedSeparators(): void
    {
        $this->assertSame(
            'ABcDefGh',
            new PascalCase(new TextOf('a_bc-def gh'))->value(),
            'Should normalize mixed separators to PascalCase'
        );
    }

    #[Test]
    public function leavesPascalAsIs(): void
    {
        $this->assertSame(
            'MyRepo',
            new PascalCase(new TextOf('MyRepo'))->value(),
            'Should not change already PascalCase'
        );
    }

    #[Test]
    public function handlesSingleWord(): void
    {
        $this->assertSame(
            'Hello',
            new PascalCase(new TextOf('hello'))->value(),
            'Should capitalize single word'
        );
    }

    #[Test]
    public function throwsWhenEmptyString(): void
    {
        $this->assertThrows(
            fn () => new PascalCase(new TextOf(''))->value(),
            Exception::class,
            'Should throw when value is empty'
        );
    }

    #[Test]
    public function throwsWhenContainsInvalidCharacters(): void
    {
        $this->assertThrows(
            fn () => new PascalCase(new TextOf('invalid$name'))->value(),
            Exception::class,
            'Should throw when value contains invalid characters'
        );
    }
}
