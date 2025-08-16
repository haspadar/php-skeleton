<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Task;

final readonly class Series implements Task
{
    /** @param Task[] $tasks */
    public function __construct(private array $tasks)
    {
    }

    #[\Override]
    public function perform(): void
    {
        foreach ($this->tasks as $task) {
            $task->perform();
        }
    }
}
