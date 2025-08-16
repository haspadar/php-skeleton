<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Console;

use Skeleton\Text\Text;

final readonly class LabeledTextLine implements Text
{
    public function __construct(
        private string $label,
        private Text $value,
        private int $labelWidth = 14
    ) {
    }

    #[\Override]
    public function value(): string
    {
        return sprintf("%-{$this->labelWidth}s %s", $this->label . ':', $this->value->value());
    }
}
