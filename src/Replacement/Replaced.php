<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Replacement;

use Skeleton\Text\Text;

final readonly class Replaced implements Replacement
{
    public function __construct(
        private string $placeholder,
        private Text $replacement
    ) {
    }

    #[\Override]
    public function placeholder(): string
    {
        return $this->placeholder;
    }

    #[\Override]
    public function applyTo(string $text): string
    {
        return str_replace(
            $this->placeholder,
            $this->replacement->value(),
            $text
        );
    }
}
