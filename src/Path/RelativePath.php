<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Path;

final readonly class RelativePath implements Path
{
    public function __construct(
        private Path $base,
        private Path $target
    ) {
    }

    #[\Override]
    public function value(): string
    {
        $normalize = fn (string $path): string => str_replace('\\', '/', rtrim($path, '/\\'));
        $base = $normalize($this->base->value());
        $target = $normalize($this->target->value());
        if (!str_starts_with($target, $base . '/')) {
            return $target;
        }

        return substr($target, strlen($base) + 1);
    }

}
