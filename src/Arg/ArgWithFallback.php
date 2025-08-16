<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Arg;

use Skeleton\Text\Text;

final readonly class ArgWithFallback implements Arg
{
    public function __construct(
        private Arg $origin,
        private Text $fallback
    ) {
    }

    #[\Override]
    public function name(): string
    {
        return $this->origin->name();
    }

    #[\Override]
    public function description(): string
    {
        return $this->origin->description();
    }

    #[\Override]
    public function value(): string
    {
        return $this->origin->hasValue()
            ? $this->origin->value()
            : $this->fallback->value();
    }

    #[\Override]
    public function hasValue(): bool
    {
        return $this->origin->hasValue();
    }
}
