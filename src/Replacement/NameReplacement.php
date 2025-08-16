<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Replacement;

use Skeleton\Text\Text;

final readonly class NameReplacement implements Replacement
{
    public function __construct(private Text $replacement)
    {
    }

    #[\Override]
    public function placeholder(): string
    {
        return '__NAME__';
    }

    #[\Override]
    public function applyTo(string $text): string
    {
        return new Replaced(
            $this->placeholder(),
            $this->replacement
        )->applyTo($text);
    }
}
