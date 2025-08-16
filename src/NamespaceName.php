<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton;

use Skeleton\Text\Text;

final readonly class NamespaceName implements Text
{
    public function __construct(private Text $origin)
    {
    }
    #[\Override]
    public function value(): string
    {
        $value = $this->origin->value();
        if (!preg_match('/^(?:[A-Z][A-Za-z0-9]*\\\\)*[A-Z][A-Za-z0-9]*$/', $value)) {
            throw new Exception("Invalid namespace: '$value'");
        }

        return $value;
    }
}
