<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Console;

use Skeleton\Text\Text;

final readonly class RedText implements Text
{
    public function __construct(private Text $origin)
    {
    }

    #[\Override]
    public function value(): string
    {
        return new AnsiColoredText($this->origin, "\033[0;31m")->value();
    }
}
