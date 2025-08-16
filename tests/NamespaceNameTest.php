<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Exception;
use Skeleton\NamespaceName;
use Skeleton\Text\TextOf;

final class NamespaceNameTest extends TestCase
{
    use ThrowAsserts;

    #[Test]
    public function acceptsValidNamespace(): void
    {
        $ns = new NamespaceName(new TextOf('Vendor\\Package\\Submodule'));
        $this->assertSame('Vendor\\Package\\Submodule', $ns->value(), 'Expected namespace to be accepted');
    }

    #[Test]
    public function throwsOnInvalidNamespace(): void
    {
        $this->assertThrows(
            fn () => new NamespaceName(new TextOf('vendor\\invalid'))->value(),
            Exception::class,
            'Expected Exception on invalid lowercase namespace'
        );
    }

    #[Test]
    public function throwsOnEmptyString(): void
    {
        $this->assertThrows(
            fn () => new NamespaceName(new TextOf(''))->value(),
            Exception::class,
            'Expected Exception on empty string'
        );
    }

    #[Test]
    public function throwsOnTrailingBackslash(): void
    {
        $this->assertThrows(
            fn () => new NamespaceName(new TextOf('App\\'))->value(),
            Exception::class,
            'Expected Exception on trailing backslash'
        );
    }

    #[Test]
    public function throwsOnInvalidCharacters(): void
    {
        $this->assertThrows(
            fn () => new NamespaceName(new TextOf('App\\123Invalid'))->value(),
            Exception::class,
            'Expected Exception on invalid characters in namespace part'
        );
    }
}
