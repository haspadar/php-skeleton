<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Text;

use Skeleton\Exception;

final readonly class PascalCase implements Text
{
    public function __construct(private Text $origin)
    {
    }

    #[\Override]
    public function value(): string
    {
        $value = $this->origin->value();

        if (!preg_match('/^[a-zA-Z0-9\-_ ]+$/', $value)) {
            throw new Exception("Invalid characters in string: '$value'");
        }

        return str_replace(' ', '', ucwords(str_replace(['-', '_'], ' ', $value)));
    }
}
