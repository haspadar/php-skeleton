<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\File;

use Override;
use Skeleton\Directory\Directory;
use Skeleton\Exception;
use Skeleton\Path\Path;
use Skeleton\Path\RelativePath;
use Skeleton\Text\Text;
use Skeleton\Text\TextOf;

final readonly class DiskFile implements File
{
    public function __construct(
        private Path $path
    ) {
    }

    #[Override]
    public function relativePathFor(Directory $base): RelativePath
    {
        return new RelativePath(
            $base->path(),
            $this->path
        );
    }

    #[Override]
    public function contents(): Text
    {
        $contents = @file_get_contents($this->path->value());
        if ($contents === false) {
            throw new Exception("Failed to read file: {$this->path->value()}");
        }

        return new TextOf($contents);
    }

    #[Override]
    public function path(): Path
    {
        return $this->path;
    }

    #[Override]
    public function write(Text $contents): void
    {
        $path = $this->path->value();
        $parent = dirname($path);
        if (!is_dir($parent) && !mkdir($parent, recursive: true) && !is_dir($parent)) {
            throw new Exception("Failed to create directory: {$parent}");
        }

        if (@file_put_contents($path, $contents->value()) === false) {
            throw new Exception("Failed to write: $path");
        }
    }
}
