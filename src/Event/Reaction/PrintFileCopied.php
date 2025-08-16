<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Event\Reaction;

use Skeleton\Console\Console;
use Skeleton\Console\GreenText;
use Skeleton\Event\Event;
use Skeleton\Event\FileCopied;
use Skeleton\Text\TextOf;

/**
 * @implements Reaction<FileCopied>
 */
final readonly class PrintFileCopied implements Reaction
{
    public function __construct(private Console $console)
    {
    }

    #[\Override]
    public function listensTo(): string
    {
        return FileCopied::class;
    }

    #[\Override]
    public function react(Event $event): void
    {
        $this->console->writeOutput(
            new GreenText(new TextOf('→ ' . $event->path()->value() . "\n"))
        );
    }
}
