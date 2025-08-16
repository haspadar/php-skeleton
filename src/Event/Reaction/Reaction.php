<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Event\Reaction;

use Skeleton\Event\Event;

/**
 * @template T of Event
 */
interface Reaction
{
    /** @return class-string<Event> */
    public function listensTo(): string;
    /**
     * @param T $event
     */
    public function react(Event $event): void;
}
