<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Directory;

use FilesystemIterator;
use Override;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Skeleton\File\DiskFile;
use Skeleton\File\File;
use Skeleton\Func\IsRegularFile;
use Skeleton\Func\ToDiskFile;
use Skeleton\Iterable\Filtered;
use Skeleton\Iterable\ListOf;
use Skeleton\Iterable\Mapped;
use Skeleton\Path\Path;
use Skeleton\Path\PathFrom;
use Skeleton\Text\Text;

final readonly class DiskDirectory implements Directory
{
    public function __construct(private Path $path)
    {
    }

    #[Override]
    public function path(): Path
    {
        return $this->path;
    }

    /** @return File[] */
    #[Override]
    public function files(): array
    {
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator(
                $this->path->value(),
                FilesystemIterator::SKIP_DOTS
            )
        );

        return new ListOf(
            new Mapped(
                new Filtered($iterator, new IsRegularFile()),
                new ToDiskFile($this->path)
            )
        )->array();
    }

    #[Override]
    public function put(File $source, Text $contents): void
    {
        $targetFile = new DiskFile(
            new PathFrom(
                $this->path->value() . DIRECTORY_SEPARATOR . $source->relativePathFor($this)->value()
            )
        );
        $targetFile->write($contents);
    }

    #[Override]
    public function create(string $relativePath): File
    {
        $base = rtrim($this->path->value(), '/\\');
        $absolute = $base . DIRECTORY_SEPARATOR . ltrim($relativePath, '/\\');
        return new DiskFile(new PathFrom($absolute));
    }
}
