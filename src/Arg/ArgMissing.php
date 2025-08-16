<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Arg;

use Skeleton\Exception;

final readonly class ArgMissing implements Arg
{
    public function __construct(
        private string $name,
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
        throw new Exception("Argument --$this->name not provided");
    }

    #[\Override]
    public function description(): string
    {
        return $this->description;
    }

    #[\Override]
    public function hasValue(): bool
    {
        return false;
    }
}
