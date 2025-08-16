<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Replacement;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Replacement\NamespaceReplacement;
use Skeleton\Text\TextOf;

final class NamespaceReplacementTest extends TestCase
{
    #[Test]
    public function replacesSingleOccurrence(): void
    {
        $this->assertSame(
            'namespace App\\Core;',
            new NamespaceReplacement(new TextOf('App\\Core'))->applyTo('namespace __NAMESPACE__;'),
            'single placeholder replaced'
        );
    }

    #[Test]
    public function leavesTextUntouchedWhenNoPlaceholder(): void
    {
        $this->assertSame(
            'namespace Foo;',
            new NamespaceReplacement(new TextOf('App\\Core'))->applyTo('namespace Foo;'),
            'no placeholder -> unchanged'
        );
    }

    #[Test]
    public function replacesMultipleOccurrencesOnOneLine(): void
    {
        $this->assertSame(
            'use App\\Core\\Service; use App\\Core\\Repo;',
            new NamespaceReplacement(new TextOf('App\\Core'))->applyTo('use __NAMESPACE__\\Service; use __NAMESPACE__\\Repo;'),
            'multiple placeholders on one line'
        );
    }

    #[Test]
    public function replacesInMultilineText(): void
    {
        $this->assertSame(
            "namespace App\\Core;\nuse App\\Core\\Service;",
            new NamespaceReplacement(new TextOf('App\\Core'))->applyTo("namespace __NAMESPACE__;\nuse __NAMESPACE__\\Service;"),
            'multiline replacement'
        );
    }
}
