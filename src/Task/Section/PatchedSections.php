<?php

/*
 * SPDX-FileCopyrightText: Copyright (c) 2025 Kanstantsin Mesnik
 * SPDX-License-Identifier: MIT
 */
declare(strict_types=1);

namespace Skeleton\Task\Section;

use Skeleton\Text\Text;

/**
 * Replaces section bodies in target text.
 * Section format:
 *   ## Title
 *   ...content...
 *   ---
 */
final readonly class PatchedSections implements Text
{
    public function __construct(
        private Text $target,
        /** @var iterable<Section> */
        private iterable $replacements
    ) {
    }

    #[\Override]
    public function value(): string
    {
        $result = $this->target->value();

        foreach ($this->replacements as $section) {
            $name = preg_quote($section->name(), '/');
            $pattern = '/^(##\h*' . $name . '\h*\R)(.*?)(?=^---\h*$)/msu';
            $body = rtrim($section->content()->value()) . "\n";
            $replaced = preg_replace($pattern, '$1' . $body, $result, -1, $count);
            if ($replaced !== null && $count > 0) {
                $result = $replaced;
            }
        }

        return $result;
    }
}
