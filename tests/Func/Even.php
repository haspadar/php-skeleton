<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Func;

use Skeleton\Func\Pred;

/**
 * @implements Pred<int>
 */
final readonly class Even implements Pred
{
    /**
     * @param int $input
     */
    public function test(mixed $input): bool
    {
        return is_int($input) && $input % 2 === 0;
    }
}
