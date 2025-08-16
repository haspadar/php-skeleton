<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Func;

use Skeleton\Func\Pred;

/**
 * @implements Pred<int|float>
 */
final class GreaterThan implements Pred
{
    /**
     * @param int|float $threshold
     */
    public function __construct(private int|float $threshold)
    {
    }

    /**
     * @param int|float $input
     */
    public function test(mixed $input): bool
    {
        return $input > $this->threshold;
    }
}
