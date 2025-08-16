<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Event;

use Skeleton\Each;
use Skeleton\Event\Reaction\Reaction;

final readonly class Events
{
    /** @var array<class-string<Event>, list<Reaction>> */
    public function __construct(private array $reactions = [])
    {
    }

    public function with(Reaction ...$reactions): self
    {
        $map = $this->reactions;
        foreach ($reactions as $reaction) {
            $map[$reaction->listensTo()][] = $reaction;
        }

        return new self($map);
    }

    public function publish(Event $event): void
    {
        if (!\array_key_exists($event::class, $this->reactions)) {
            return;
        }

        new Each(
            $this->reactions[$event::class],
            fn (Reaction $reaction) => $reaction->react($event)
        )->perform();
    }
}
