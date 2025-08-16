<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Func;

use Skeleton\Func\Pred;

/**
 * @template T
 * @implements Pred<T>
 */
final class AlwaysFalse implements Pred
{
    /**
     * @param T $input
     */
    public function test(mixed $input): bool
    {
        return false;
    }
}
