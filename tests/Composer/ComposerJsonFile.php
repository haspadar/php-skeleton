<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Composer;

use Skeleton\Text\Text;

final readonly class ComposerJsonFile implements Text
{
    public function __construct(
        private string $path = __DIR__ . '/../Fixtures/composer.json'
    ) {
    }

    public function value(): string
    {
        $contents = @file_get_contents($this->path);
        if ($contents === false) {
            throw new \RuntimeException("Cannot read: $this->path");
        }

        return $contents;
    }
}
