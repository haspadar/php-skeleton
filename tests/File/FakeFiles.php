<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\File;

use Skeleton\File\File;
use Skeleton\File\Files;

/**
 * @implements \IteratorAggregate<int, File>
 */
final readonly class FakeFiles implements Files
{
    /**
     * @param File[] $files
     */
    public function __construct(private array $files)
    {
    }

    public function getIterator(): \Traversable
    {
        yield from $this->files;
    }
}
