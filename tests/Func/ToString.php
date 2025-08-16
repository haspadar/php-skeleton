<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Func;

use Skeleton\Func\Func;

/** @implements Func<mixed,string> */
final readonly class ToString implements Func
{
    public function apply(mixed $input): string
    {
        return (string) $input;
    }
}
