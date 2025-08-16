<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton;

use Skeleton\Text\Text;

/**
 * Returns a trimmed, human-readable name.
 * Empty input is rejected.
 */
final readonly class HumanReadableName implements Text
{
    public function __construct(private Text $origin)
    {
    }

    /**
     * @throws Exception
     */
    #[\Override]
    public function value(): string
    {
        $value = trim($this->origin->value());
        if ($value === '') {
            throw new Exception('Name cannot be empty');
        }
        return $value;
    }
}
