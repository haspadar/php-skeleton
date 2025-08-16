<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Event\Reaction;

use Skeleton\Console\Console;
use Skeleton\Console\YellowText;
use Skeleton\Event\Event;
use Skeleton\Event\FilePatched;
use Skeleton\Text\TextOf;

/**
 * @implements Reaction<FilePatched>
 */
final readonly class PrintFilePatched implements Reaction
{
    public function __construct(private Console $console)
    {
    }

    #[\Override]
    public function listensTo(): string
    {
        return FilePatched::class;
    }

    #[\Override]
    public function react(Event $event): void
    {
        $this->console->writeOutput(
            new YellowText(new TextOf('~ ' . $event->path()->value() . "\n"))
        );
    }
}
