<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\File;

use Skeleton\Directory\Directory;
use Skeleton\File\File;
use Skeleton\Path\Path;
use Skeleton\Path\PathFrom;
use Skeleton\Path\RelativePath;
use Skeleton\Text\Text;
use Skeleton\Text\TextOf;

final class FakeFile implements File
{
    public function __construct(
        private string $relativePath,
        private string $contents
    ) {
    }

    public function relativePathFor(Directory $base): RelativePath
    {
        return new RelativePath(
            $base->path(),
            new PathFrom($this->relativePath)
        );
    }

    public function path(): Path
    {
        return new PathFrom($this->relativePath);
    }

    public function contents(): Text
    {
        return new TextOf($this->contents);
    }

    #[\Override]
    public function write(Text $contents): void
    {
        $this->contents = $contents->value();
    }
}
