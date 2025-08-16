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
 * @implements Func<TIn, TOut>
 */
final readonly class FuncOf implements Func
{
    /** @var \Closure(TIn):TOut */
    private \Closure $fn;

    /**
     * @param Closure(TIn):TOut $fn
     */
    public function __construct(\Closure $fn)
    {
        $this->fn = $fn(...);
    }

    #[\Override]
    public function apply(mixed $input): mixed
    {
        return ($this->fn)($input);
    }
}
