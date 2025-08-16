<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Rule;

use Skeleton\Event\Events;
use Skeleton\File\File;
use Skeleton\Task\CopyFileTask;
use Skeleton\Task\Task;

final readonly class CopyAsIs implements CopyRule
{
    #[\Override]
    public function taskFor(File $source, File $target, Events $events): Task
    {
        return new CopyFileTask($source, $target, $events);
    }
}
