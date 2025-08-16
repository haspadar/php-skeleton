<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Func;

use Skeleton\Func\Func;

/** @implements Func<string,string> */
final readonly class AppendSuffix implements Func
{
    public function __construct(private string $suffix)
    {
    }

    /** @param string $input */
    public function apply(mixed $input): string
    {
        return $input . $this->suffix;
    }
}
