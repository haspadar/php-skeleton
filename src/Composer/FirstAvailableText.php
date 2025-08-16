<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Composer;

use Skeleton\Exception;
use Skeleton\Text\Text;

final readonly class FirstAvailableText implements Text
{
    /** @var Text[] */
    private array $candidates;

    public function __construct(Text ...$candidates)
    {
        $this->candidates = $candidates;
    }

    #[\Override]
    public function value(): string
    {
        foreach ($this->candidates as $candidate) {
            $value = $candidate->value();
            if ($value !== '') {
                return $value;
            }
        }

        throw new Exception('No available Text provided any value.');
    }
}
