<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Func;

/**
 * @template TIn
 * @template TOut
 */
interface Func
{
    /**
     * @param TIn $input
     * @return TOut
     */
    public function apply(mixed $input): mixed;
}
