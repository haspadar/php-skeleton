<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Func;

/**
 * @template T
 */
interface Pred
{
    /**
     * @param T $input
     */
    public function test(mixed $input): bool;
}
