<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Task;

use Skeleton\Func\Pred;

final readonly class OnlyIf implements Task
{
    public function __construct(private Pred $when, private Task $then)
    {
    }

    #[\Override]
    public function perform(): void
    {
        if ($this->when->test($this)) {
            $this->then->perform();
        }
    }
}
