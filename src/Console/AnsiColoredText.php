<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Console;

use Skeleton\Text\Text;

final readonly class AnsiColoredText implements Text
{
    public function __construct(
        private Text $origin,
        private string $code
    ) {
    }

    #[\Override]
    public function value(): string
    {
        return $this->code . $this->origin->value() . "\033[0m";
    }
}
