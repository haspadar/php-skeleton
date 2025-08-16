<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Text;

final readonly class Capitalized implements Text
{
    public function __construct(
        private Text $origin
    ) {
    }

    #[\Override]
    public function value(): string
    {
        $str = $this->origin->value();
        return mb_strtoupper(mb_substr($str, 0, 1)) . mb_substr($str, 1);
    }
}
