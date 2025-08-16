<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Tests\Task;

use Skeleton\Task\Task;

final readonly class DummyTask implements Task
{
    public function perform(): void
    {
    }
}
