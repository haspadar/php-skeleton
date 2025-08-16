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
use Skeleton\RepoName;
use Skeleton\Text\TextOf;

final class RepoNameTest extends TestCase
{
    use ThrowAsserts;

    #[Test]
    public function returnsLowercasedValue(): void
    {
        $this->assertSame(
            'my_repo',
            new RepoName(new TextOf('My_Repo'))->value(),
            'RepoName should convert to lowercase'
        );
    }

    #[Test]
    public function acceptsValidCharacters(): void
    {
        $this->assertSame(
            'abc-123_repo',
            new RepoName(new TextOf('ABC-123_repo'))->value(),
            'RepoName should allow lowercase letters, numbers, hyphens, and underscores'
        );
    }

    #[Test]
    public function throwsWhenContainsInvalidCharacter(): void
    {
        $this->assertThrows(
            fn () => new RepoName(new TextOf('invalid/repo'))->value(),
            Exception::class,
            'RepoName should reject slashes or other invalid characters'
        );
    }

    #[Test]
    public function throwsWhenContainsUppercaseAfterNormalization(): void
    {
        $this->assertThrows(
            fn () => (new RepoName(new TextOf('repo!')))->value(),
            Exception::class,
            'RepoName should reject exclamation mark'
        );
    }
}
