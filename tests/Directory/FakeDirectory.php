<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Directory;

use Skeleton\Directory\Directory;
use Skeleton\File\File;
use Skeleton\Path\Path;
use Skeleton\Path\PathFrom;
use Skeleton\Tests\File\FakeFile;
use Skeleton\Text\Text;

final class FakeDirectory implements Directory
{
    /** @var File[] */
    private array $files;

    /** @var array<string,string> */
    private array $written = [];

    /**
     * @param File[] $files
     */
    public function __construct(array $files = [])
    {
        $this->files = $files;
    }

    public function path(): Path
    {
        return new PathFrom('/fake');
    }

    /** @return File[] */
    public function files(): array
    {
        return $this->files;
    }

    public function put(File $source, Text $contents): void
    {
        $this->written[$source->relativePathFor($this)->value()] = $contents->value();
    }

    /** @return array<string,string> */
    public function written(): array
    {
        return $this->written;
    }

    #[\Override]
    public function create(string $relativePath): File
    {
        return new FakeFile($relativePath, '');
    }
}
