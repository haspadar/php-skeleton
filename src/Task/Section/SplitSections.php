<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Task\Section;

use IteratorAggregate;
use Skeleton\Text\Text;
use Skeleton\Text\TextOf;
use Traversable;

/**
 * Extracts sections in format:
 * ## Title
 * ...
 * ---
 *
 * @implements IteratorAggregate<int, Section>
 */
final readonly class SplitSections implements IteratorAggregate
{
    public function __construct(private Text $text)
    {
    }

    /**
     * @return Traversable<Section>
     */
    #[\Override]
    public function getIterator(): Traversable
    {
        $pattern = '/^##\s*(.+?)\s*$(.*?)(?=^---$)/ms';
        preg_match_all($pattern, $this->text->value(), $matches, PREG_SET_ORDER);
        foreach ($matches as $match) {
            $name = trim($match[1]);
            $body = ltrim($match[2]);
            yield new Section($name, new TextOf($body));
        }
    }
}
