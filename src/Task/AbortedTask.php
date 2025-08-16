<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Task;

use Skeleton\Console\Console;
use Skeleton\Console\RedText;
use Skeleton\Text\TextOf;

final readonly class AbortedTask implements Task
{
    public function __construct(private Console $console)
    {
    }

    #[\Override]
    public function perform(): void
    {
        $this->console->writeError(
            new RedText(
                new TextOf("\nAborted.\n")
            )
        );
    }
}
