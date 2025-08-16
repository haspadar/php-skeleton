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
use Skeleton\Task\PatchFileTask;
use Skeleton\Task\Task;

final readonly class CopyBySections implements CopyRule
{
    #[\Override]
    public function taskFor(File $source, File $target, Events $events): Task
    {
        if (!file_exists($target->path()->value())) {
            return new CopyFileTask($source, $target, $events);
        }

        return new PatchFileTask($source, $target, $events);
    }
}
