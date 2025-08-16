<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Func;

use Skeleton\File\File;
use Skeleton\File\ReplacedFile;
use Skeleton\Replacement\Replacement;

/**
 * @implements Func<File,File>
 */
final readonly class ToReplacedFile implements Func
{
    /** @param Replacement[] $replacements */
    public function __construct(
        private array $replacements
    ) {
    }

    /** @param File $input */
    #[\Override]
    public function apply(mixed $input): File
    {
        return new ReplacedFile($input, $this->replacements);
    }
}
