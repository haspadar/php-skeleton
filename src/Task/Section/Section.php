<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Task\Section;

use Skeleton\Text\Text;

final readonly class Section
{
    public function __construct(
        private string $name,
        private Text $content
    ) {
    }

    public function name(): string
    {
        return $this->name;
    }

    public function content(): Text
    {
        return $this->content;
    }
}
