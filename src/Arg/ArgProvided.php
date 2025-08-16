<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Arg;

final readonly class ArgProvided implements Arg
{
    public function __construct(
        private string $name,
        private string $value,
        private string $description = ''
    ) {
    }

    #[\Override]
    public function name(): string
    {
        return $this->name;
    }

    #[\Override]
    public function value(): string
    {
        return $this->value;
    }

    #[\Override]
    public function description(): string
    {
        return $this->description;
    }

    #[\Override]
    public function hasValue(): bool
    {
        return true;
    }
}
