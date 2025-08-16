<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\File;

use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use Skeleton\File\ReplacedFile;
use Skeleton\Replacement\Replaced;
use Skeleton\Text\TextOf;

final class ReplacedFileTest extends TestCase
{
    #[Test]
    public function replacesTokensInContent(): void
    {
        $this->assertSame(
            'after',
            new ReplacedFile(
                new FakeFile('file.txt', 'before'),
                [new Replaced('before', new TextOf('after'))]
            )->contents()->value(),
            'Expected replacement to be applied'
        );
    }
}
