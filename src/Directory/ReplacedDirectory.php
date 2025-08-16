<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Directory;

use Skeleton\File\File;
use Skeleton\Func\ToReplacedFile;
use Skeleton\Iterable\ListOf;
use Skeleton\Iterable\Mapped;
use Skeleton\Path\Path;
use Skeleton\Replacement\Replacement;
use Skeleton\Text\Text;

final readonly class ReplacedDirectory implements Directory
{
    /** @param Replacement[] $replacements */
    public function __construct(
        private Directory $origin,
        private array $replacements
    ) {
    }

    /** @return File[] */
    #[\Override]
    public function files(): array
    {
        return new ListOf(
            new Mapped(
                $this->origin->files(),
                new ToReplacedFile($this->replacements)
            )
        )->array();
    }

    #[\Override]
    public function path(): Path
    {
        return $this->origin->path();
    }

    #[\Override]
    public function put(File $source, Text $contents): void
    {
        $this->origin->put($source, $contents);
    }

    #[\Override]
    public function create(string $relativePath): File
    {
        return $this->origin->create($relativePath);
    }
}
