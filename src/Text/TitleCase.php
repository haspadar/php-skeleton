<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Text;

use Skeleton\Func\FuncOf;
use Skeleton\Iterable\Mapped;
use Skeleton\Iterable\SplitByPattern;

/**
 * Converts `php-skeleton` into `Php Skeleton`.
 */
final readonly class TitleCase implements Text
{
    public function __construct(private Text $origin)
    {
    }

    #[\Override]
    public function value(): string
    {
        return new Joined(
            ' ',
            new Mapped(
                new SplitByPattern('/[-_]+/', $this->origin),
                new FuncOf(fn (Text $word): \Skeleton\Text\Capitalized => new Capitalized($word))
            )
        )->value();
    }
}
