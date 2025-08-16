<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Func;

use Skeleton\Func\Func;

/** @implements Func<int,int> */
final readonly class Square implements Func
{
    /** @param int $input */
    public function apply(mixed $input): int
    {
        return $input * $input;
    }
}
