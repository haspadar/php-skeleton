<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Text;

/**
 * Caches result of value() after first evaluation.
 */
final class StickyText implements Text
{
    private string $memo = '';
    public function __construct(private Text $origin)
    {
    }

    #[\Override]
    public function value(): string
    {
        if ($this->memo === '') {
            $this->memo = $this->origin->value();
        }

        return $this->memo;
    }
}
