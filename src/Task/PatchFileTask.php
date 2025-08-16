<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Task;

use Skeleton\Event\Events;
use Skeleton\Event\FilePatched;
use Skeleton\Exception;
use Skeleton\File\File;
use Skeleton\Task\Section\PatchedSections;
use Skeleton\Task\Section\SplitSections;
use Skeleton\Text\TextOf;

final readonly class PatchFileTask implements Task
{
    public function __construct(
        private File $source,
        private File $target,
        private Events $events,
    ) {
    }

    #[\Override]
    public function perform(): void
    {
        $targetPath = $this->target->path()->value();
        $raw = @file_get_contents($targetPath);
        if ($raw === false) {
            throw new Exception("Failed to read: $targetPath");
        }

        $patched = new PatchedSections(
            new TextOf($raw),
            new SplitSections($this->source->contents())
        );

        $this->target->write($patched);
        $this->events->publish(new FilePatched($this->target->path()));
    }
}
