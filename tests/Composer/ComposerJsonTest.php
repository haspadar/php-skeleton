<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Composer;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\Composer\ComposerJson;

final class ComposerJsonTest extends TestCase
{
    #[Test]
    public function returnsDescription(): void
    {
        $this->assertSame(
            'Lib',
            new ComposerJson(new ComposerJsonFile())->description()->value(),
            'description'
        );
    }

    #[Test]
    public function returnsVendor(): void
    {
        $this->assertSame(
            'Haspadar',
            new ComposerJson(new ComposerJsonFile())->vendor()->value(),
            'vendor'
        );
    }

    #[Test]
    public function returnsRepo(): void
    {
        $this->assertSame(
            'mono',
            new ComposerJson(new ComposerJsonFile())->repo()->value(),
            'repo'
        );
    }

    #[Test]
    public function returnsFirstPsr4NamespaceKey(): void
    {
        $this->assertSame(
            'Mono',
            new ComposerJson(new ComposerJsonFile())->namespace()->value(),
            'first psr-4 key'
        );
    }
}
