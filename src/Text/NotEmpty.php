<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Text;

use Skeleton\Exception;

final readonly class NotEmpty implements Text
{
    public function __construct(private Text $origin, private string $message = 'Text must not be empty')
    {
    }

    #[\Override]
    public function value(): string
    {
        $value = $this->origin->value();
        if ($value === '') {
            throw new Exception($this->message);
        }
        return $value;
    }
}
