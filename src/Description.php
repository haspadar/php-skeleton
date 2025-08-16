<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton;

use Skeleton\Text\Text;

final readonly class Description implements Text
{
    public function __construct(private Text $origin, private int $length = 140)
    {
    }

    #[\Override]
    public function value(): string
    {
        $raw = trim($this->origin->value());

        return mb_substr($raw, 0, $this->length);
    }
}
