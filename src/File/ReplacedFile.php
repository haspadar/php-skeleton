<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\File;

use Skeleton\Directory\Directory;
use Skeleton\Path\Path;
use Skeleton\Path\RelativePath;
use Skeleton\Replacement\Replacement;
use Skeleton\Text\Text;
use Skeleton\Text\TextOf;

final readonly class ReplacedFile implements File
{
    /**
     * @param Replacement[] $replacements
     */
    public function __construct(
        private File $origin,
        private array $replacements
    ) {
    }

    #[\Override]
    public function path(): Path
    {
        return $this->origin->path();
    }

    #[\Override]
    public function contents(): Text
    {
        $text = $this->origin->contents()->value();
        foreach ($this->replacements as $replacement) {
            $text = $replacement->applyTo($text);
        }

        return new TextOf($text);
    }

    #[\Override]
    public function relativePathFor(Directory $base): RelativePath
    {
        return $this->origin->relativePathFor($base);
    }

    #[\Override]
    public function write(Text $contents): void
    {
        $this->origin->write($contents);
    }
}
