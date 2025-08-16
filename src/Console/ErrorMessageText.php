<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Console;

use Skeleton\Text\Text;
use Skeleton\Text\TextOf;

final readonly class ErrorMessageText implements Text
{
    public function __construct(private Text $origin)
    {
    }

    #[\Override]
    public function value(): string
    {
        return new RedText(
            new TextOf('❌ Error: ' . $this->origin->value() . "\n")
        )->value();
    }
}
