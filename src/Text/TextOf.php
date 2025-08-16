<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Text;

final readonly class TextOf implements Text
{
    public function __construct(private string $text)
    {
    }

    #[\Override]
    public function value(): string
    {
        return $this->text;
    }

}
