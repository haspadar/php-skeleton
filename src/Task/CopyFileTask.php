<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Task;

use Override;
use Skeleton\Event\Events;
use Skeleton\Event\FileCopied;
use Skeleton\File\File;

final readonly class CopyFileTask implements Task
{
    public function __construct(
        private File $source,
        private File $target,
        private Events $events
    ) {
    }

    #[Override]
    public function perform(): void
    {
        $this->target->write($this->source->contents());
        $this->events->publish(
            new FileCopied($this->target->path())
        );
    }
}
